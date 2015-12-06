<?php

class Projectreport_controller extends Engineer_Controller
{

    /**
     * Constructor withe the required library classes loaded
     */
    public function __construct()
    {
        parent::__construct();

        //libraries for form validation
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        //read folder specified
        $this->load->helper('directory');
        //get base url
        $this->load->helper('url');
        //file handling library
        $this->load->helper("file");
        //pdf file generator
        $this->load->helper('pdf_helper.php');
        //report model load
        $this->load->model('report_m');


    }

    public function index()
    {

        $this->data['reportlist'] = directory_map('./reports/', 1);
        $this->data['subview'] = 'engineer/user/report/report_view';
        $this->load->view("engineer/_layout_main", $this->data);

    }

    /**
     * Generate Reports according to the user's options given
     */
    public function generateReport(){

        // set document information
        $title = $this->input->post('reportTitle');
        $option = $this->input->post('reportType');

        //form validations
        $this->form_validation->set_rules('reportTitle', 'Report Title', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == FALSE){
            $this->data['reportlist'] = json_decode($this->report_m->getReportListByUser());
            $this->data['subview'] = 'engineer/user/report/report_view';
            $this->load->view("engineer/_layout_main", $this->data);
            return;
        }else {

            if($option == 1){
                $this->generateTestCaseDetails($option,$title);
            }else if($option == 2){
                $this->generateReleaseNote($option,$title);
            }else if($option == 0){
                $this->generateIssueLevelReport($option,$title);
            }

        }
    }

    /**
     * @param $title User provided title for the report
     * @return TCPDF object
     */

    public function pdfConfig($title){
        //call the libraries from helper class method
        tcpdf();

        // create new PDF document
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //set title of report
        $obj_pdf->SetAuthor($this->session->userdata['username']);
        $obj_pdf->SetTitle($title);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);

        return $obj_pdf;

    }

    /**
     * @param $uid current user id
     * @param $reportName the generated report name
     * @param $path path where the file is saved
     * @return array return the array of data to be saved
     */
    public function saveReport($uid,$reportName,$path){
        $data = array(
            'uid' => $uid,
            'report_name' => $reportName,
            'report_url' => $path
        );
        return $data;
    }

    /**
     * @param $option the user selected option
     * @param $uname curent user name
     * @return string returns the generated name for the file
     */
    public function generateReportName($option,$uname){
        $date = date('Y-m-d');
        $name="report";
       if($option==0){
            $name='Issue_Level_'.$date.'_'.$uname;
        }else if($option==1){
            $name='Test_Details_'.$date.'_'.$uname;
        }else if($option==2){
            $name='QA_Release_'.$date.'_'.$uname;
        }

        return $name;

    }

    /**
     * @param $option user selected option
     * @param $title user customized title
     * Generate test case detail report
     */
    public function generateTestCaseDetails($option,$title){
        $this->load->model('project_m');
        $pid = $this->session->userdata('project_id');

        $uid = $this->session->userdata('uid');
        $uname = $this->session->userdata('username');
        $projectName = $this->project_m->getProjectName($pid);

        $failTests = $this->project_m->getFailedTestcases($pid);
        $passTests = $this->project_m->getPassedTestcases($pid);
        $inprogressTC = $this->project_m->getInProgressTestcases($pid);
        if (($failTests + $passTests + $inprogressTC) != 0) {
            $health = round(($failTests / ($failTests + $passTests + $inprogressTC)) * 100,2).'%';
        } else
            $health = '-';

        $projectDetails = $this->project_m->get_projectDetails($pid);
        $header = array('Project', 'Total Testcases', 'Failed TC', 'Passed TC', 'InProgress TC', 'Project Health');
        $data = array();
        $data[] = array($projectName, $failTests + $passTests + $inprogressTC, $failTests, $passTests, $inprogressTC, $health);

        //call the pdf report basic configuration method
        $obj_pdf = $this->pdfConfig($title);

        // add a page
        $obj_pdf->AddPage();
        // column titles

        $obj_pdf->Write(0, 'Project Name : '.$projectDetails[0]->name);
        $obj_pdf->Ln();
        $obj_pdf->Ln();
        $obj_pdf->Write(0, 'Project Status : '.($projectDetails[0]->status));
        $obj_pdf->Ln();
        $obj_pdf->Ln();
        $obj_pdf->Write(0, 'Project Start Date : '.$projectDetails[0]->starting_date);
        $obj_pdf->Ln();
        $obj_pdf->Ln();
        $obj_pdf->Write(0, 'Project End Date : '.$projectDetails[0]->ending_date);
        $obj_pdf->Ln();
        $obj_pdf->Ln();
        $obj_pdf->Ln();
        $obj_pdf->Ln();

        // print colored table
        // Colors, line width and bold font
        $obj_pdf->SetFillColor(205, 201, 201);
        $obj_pdf->SetTextColor(0,0,0);
        $obj_pdf->SetDrawColor(128, 0, 0);
        $obj_pdf->SetLineWidth(0.3);
        $obj_pdf->SetFont('', 'B');
        // Header
        $w = array(40, 26, 26, 25,26,26);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $obj_pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $obj_pdf->Ln();
        // Color and font restoration
        $obj_pdf->SetFillColor(224, 235, 255);
        $obj_pdf->SetTextColor(0);
        $obj_pdf->SetFont('');
        // Data
        $fill = 0;

        //loop through the data array and fill the columns
        foreach($data as $row) {
            $obj_pdf->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $obj_pdf->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $obj_pdf->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
            $obj_pdf->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
            $obj_pdf->Cell($w[4], 6, $row[4], 'LR', 0, 'R', $fill);
            $obj_pdf->Cell($w[5], 6, $row[5], 'LR', 0, 'R', $fill);
            $obj_pdf->Ln();
            $fill=!$fill;
        }
        $obj_pdf->Cell(array_sum($w), 0, '', 'T');

        $path = 'C:/xampp/htdocs/QADash/public_html/reports';
        // Supply a filename including the .pdf extension
        $filename = $this->generateReportName($option,$uname);

        // Create the full path
        $full_path = $path . '/' . $filename;

        // Output PDF
        $obj_pdf->Output($full_path, 'F');

        //save report details in database
        $details=$this->saveReport($uid,$filename,$path.'/'.$filename);
        $this->report_m->saveReport($details);

        //redirect to view the generated pdf file
        $this->data['report'] = $filename;
        $this->data['subview'] = 'engineer/user/report/singleReport_view';
        $this->load->view("engineer/_layout_main", $this->data);

    }

    /**
     * @param $option user selected option
     * @param $title user customized title
     * Generate release note detail report
     */
    public function generateReleaseNote($option,$title){

        $this->load->model('project_m');
        $this->load->model('viewAllIssues_m');
        $this->load->model('report_m');
        $pid = $this->session->userdata('project_id');


        //headers
        $header = array('Issue Description', 'Priority', 'Severity', 'Status');
        $data= $this->report_m->getIssues($pid);

        $pid= 3;
        $uid = $this->session->userdata('uid');
        $uname = $this->session->userdata('username');
        $projectName = $this->project_m->getProjectName($pid);

        $projectDetails = $this->project_m->get_projectDetails($pid);

        $failTests = $this->project_m->getFailedTestcases($pid);
        $passTests = $this->project_m->getPassedTestcases($pid);
        $inprogressTC = $this->project_m->getInProgressTestcases($pid);

        $pdf= $this->pdfConfig($title);
        // add a page
        $pdf->AddPage();

        $pdf->Write(0, 'Project Name : '.$projectDetails[0]->name);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Status : '.($projectDetails[0]->status));
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Start Date : '.$projectDetails[0]->starting_date);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project End Date : '.$projectDetails[0]->ending_date);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Write(0, 'Project Total Test Cases : '.($passTests+$failTests+$inprogressTC));
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project In Progress Test Cases : '.$inprogressTC);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Failed Test Cases : '.$failTests);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Passes Test Cases : '.$passTests);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        // print colored table
        // Colors, line width and bold font
        $pdf->SetFillColor(205, 201, 201);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(128, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
        // Header
        $w = array(40, 40, 40, 40);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        // Data
        $fill = 0;
        //loop through the data array and fill the columns
        foreach($data as $row) {
            $pdf->Cell($w[0], 6, $row->description, 'LR', 0, 'L', $fill);
            if($row->priority_id == 1){
                $priority='High';
            }else if($row->priority_id == 2) {
                $priority='Medium';
            }else{
                $priority='Low';
            }
            if($row->severity_id == 1){
                $severity='High';
            }else if($row->severity_id == 2) {
                $severity='Medium';
            }else{
                $severity='Low';
            }
            $pdf->Cell($w[1], 6, $priority, 'LR', 0, 'L', $fill);
            $pdf->Cell($w[2], 6, $severity, 'LR', 0, 'R', $fill);
            $pdf->Cell($w[3], 6, $row->status, 'LR', 0, 'R', $fill);
            $pdf->Ln();
            $fill=!$fill;
        }
        $pdf->Cell(array_sum($w), 0, '', 'T');


        $path = 'C:/xampp/htdocs/QADash/public_html/reports';
        // Supply a filename including the .pdf extension
        $filename = $this->generateReportName($option,$uname);

        // Create the full path
        $full_path = $path . '/' . $filename;

        // Output PDF
        $pdf->Output($full_path, 'F');

        //save report details in database
        $details=$this->saveReport($uid,$filename,$path.'/'.$filename);
        $this->report_m->saveReport($details);

        //redirect to view the generated pdf file
        $this->data['report'] = $filename;
        $this->data['subview'] = 'engineer/user/report/singleReport_view';
        $this->load->view("engineer/_layout_main", $this->data);



    }

    /**
     * @param $option user selected option
     * @param $title user customized title
     * Generate issue level detail report
     */
    public function generateIssueLevelReport($option,$title){

        $this->load->model('project_m');
        $this->load->model('viewAllIssues_m');
        $this->load->model('report_m');
        $pid = $this->session->userdata('project_id');


        //headers
        $header = array('Issue Description', 'Priority', 'Severity', 'Status');
        $data= $this->report_m->getIssues($pid);


        $uid = $this->session->userdata('uid');
        $uname = $this->session->userdata('username');
        $projectName = $this->project_m->getProjectName($pid);

        $projectDetails = $this->project_m->get_projectDetails($pid);

        $failTests = $this->project_m->getFailedTestcases($pid);
        $passTests = $this->project_m->getPassedTestcases($pid);
        $inprogressTC = $this->project_m->getInProgressTestcases($pid);

        $pdf= $this->pdfConfig($title);
        // add a page
        $pdf->AddPage();

        $pdf->Write(0, 'Project Name : '.$projectDetails[0]->name);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Status : '.($projectDetails[0]->status));
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project Start Date : '.$projectDetails[0]->starting_date);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(0, 'Project End Date : '.$projectDetails[0]->ending_date);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();

        // print colored table
        // Colors, line width and bold font
        $pdf->SetFillColor(205, 201, 201);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(128, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
        // Header
        $w = array(40, 40, 40, 40);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        // Data
        $fill = 0;
        //loop through the data array and fill the columns
        foreach($data as $row) {
            $pdf->Cell($w[0], 6, $row->description, 'LR', 0, 'L', $fill);
            if($row->priority_id == 1){
                $priority='High';
            }else if($row->priority_id == 2) {
                $priority='Medium';
            }else{
                $priority='Low';
            }
            if($row->severity_id == 1){
                $severity='High';
            }else if($row->severity_id == 2) {
                $severity='Medium';
            }else{
                $severity='Low';
            }
            $pdf->Cell($w[1], 6, $priority, 'LR', 0, 'L', $fill);
            $pdf->Cell($w[2], 6, $severity, 'LR', 0, 'R', $fill);
            $pdf->Cell($w[3], 6, $row->status, 'LR', 0, 'R', $fill);
            $pdf->Ln();
            $fill=!$fill;
        }
        $pdf->Cell(array_sum($w), 0, '', 'T');


        $path = 'C:/xampp/htdocs/QADash/public_html/reports';
        // Supply a filename including the .pdf extension
        $filename = $this->generateReportName($option,$uname);

        // Create the full path
        $full_path = $path . '/' . $filename;

        // Output PDF
        $pdf->Output($full_path, 'F');

        //save report details in database
        $details=$this->saveReport($uid,$filename,$path.'/'.$filename);
        $this->report_m->saveReport($details);

        //redirect to view the generated pdf file
        $this->data['report'] = $filename;
        $this->data['subview'] = 'engineer/user/report/singleReport_view';
        $this->load->view("engineer/_layout_main", $this->data);



    }





}

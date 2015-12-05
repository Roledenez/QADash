<?php

class Projectreport_controller extends Admin_Controller
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
        $this->data['subview'] = 'admin/user/report/report_view';
        $this->load->view("admin/_layout_main", $this->data);

    }

    public function generateReport(){

        // set document information
        $title = $this->input->post('reportTitle');
        $option = $this->input->post('reportType');

        //form validations
        $this->form_validation->set_rules('reportTitle', 'Report Title', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == FALSE){
            $this->data['reportlist'] = json_decode($this->report_m->getReportListByUser());
            $this->data['subview'] = 'admin/user/report/report_view';
            $this->load->view("admin/_layout_main", $this->data);
            return;
        }else {

            $this->load->model('project_m');
            $pid = $this->session->userdata('project_id');
            $uid = $this->session->userdata('uid');
            $uname = $this->session->userdata('username');
            $projectName = $this->project_m->getProjectName($pid);

            $failTests = $this->project_m->getFailedTestcases($pid);
            $passTests = $this->project_m->getPassedTestcases($pid);
            $inprogressTC = $this->project_m->getInProgressTestcases($pid);
            if (($failTests + $passTests + $inprogressTC) != 0) {
                $health = ($failTests / ($failTests + $passTests + $inprogressTC)) * 100;
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

            // print colored table
            // Colors, line width and bold font
            $obj_pdf->SetFillColor(255, 0, 0);
            $obj_pdf->SetTextColor(255);
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
            $this->data['subview'] = 'admin/user/report/singleReport_view';
            $this->load->view("admin/_layout_main", $this->data);
        }
    }

    public function pdfConfig($title){
        //call the libraries from helper class method
        tcpdf();

        // create new PDF document
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //set title of report
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

    public function saveReport($uid,$reportName,$path){
        $data = array(
            'uid' => $uid,
            'report_name' => $reportName,
            'report_url' => $path
        );
        return $data;
    }

    public function generateReportName($option,$uname){
        $date = date('Y-m-d');
        $name="report";
        if($option==0){
            $name='Project_Details_'.$date.'_'.$uname;
        }else if($option==1){
            $name='Issue_Level_'.$date.'_'.$uname;
        }else if($option==2){
            $name='Test_Details_'.$date.'_'.$uname;
        }else if($option==3){
            $name='Project_Progress_'.$date.'_'.$uname;
        }else if($option==4){
            $name='QA_Release_'.$date.'_'.$uname;
        }

        return $name;

    }



}

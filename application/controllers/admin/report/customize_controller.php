<?php


class Customize_controller extends Admin_Controller
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

        $this->data['subview'] = 'admin/user/report/custom_view';
        $this->load->view("admin/_layout_main", $this->data);

    }

    public function navigate(){

        $this->data['subview'] = 'admin/user/report/custom_view';
        $this->load->view("admin/_layout_main", $this->data);
    }

    public function getAttatchment(){
        $title = $this->input->get('title');
        $attatch = $this->input->get('attatchment');

        $this->form_validation->set_rules('reportTitle', 'Report Title', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

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

        $obj_pdf->AddPage();
        $obj_pdf->Image($attatch, 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

        $path = 'C:/xampp/htdocs/QADash/public_html/reports';
        // Supply a filename including the .pdf extension
        $filename = $this->$title;

        // Create the full path
        $full_path = $path . '/' . $filename;

        // Output PDF
        $obj_pdf->Output($full_path, 'F');

        //save report details in database
        $details=$this->saveReport($this->session->userdata['uid'],$filename,$path.'/'.$filename);
        $this->report_m->saveReport($details);

        //redirect to view the generated pdf file
        $this->data['report'] = $filename;
        $this->data['subview'] = 'admin/user/report/singleReport_view';
        $this->load->view("admin/_layout_main", $this->data);


    }
}
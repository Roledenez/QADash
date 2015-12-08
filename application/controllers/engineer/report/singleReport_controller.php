<?php


class SingleReport_controller extends Engineer_Controller
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


    }

    public function index()
    {

    }

    /**
     * Name : displayPDF
     * Description : display the PDF of generated report
     *
     * @return PDF view
     */
    public function displayPDF(){

        $fileName = $this->input->get('filename');
        $this->data['report'] = $fileName;
        $this->data['subview'] = 'engineer/user/report/singleReport_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }




}

<?php


class Report_controller extends Engineer_Controller
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
        //report model load
        $this->load->model('report_m');


    }

    public function index()
    {
        $this->data['reportlist'] = json_decode($this->report_m->getReportListByUser());
        $this->data['subview'] = 'engineer/user/report/report_view';
        $this->load->view("engineer/_layout_main", $this->data);

    }

    /**
     * Name : deleteFile
     * Description : Delete files
     * 
     */
    public function deleteFile(){
        $fileName = $this->input->get('filename');
        $result = $this->report_m->deleteReportByUser($fileName);
        if(!$result){
            echo '<script>alert("Could not delete the report! Please try again.");</script>';
        }
        chmod('./reports/'.$fileName, 0777);
        unlink('./reports/'.$fileName);
        $this->data['reportlist'] = json_decode($this->report_m->getReportListByUser());
        $this->data['subview'] = 'engineer/user/report/report_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }








}

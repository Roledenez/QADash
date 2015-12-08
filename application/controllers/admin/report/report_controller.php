<?php
class Report_controller extends Admin_Controller
{

    /**
     * Constructor withe the required library classes loaded
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        $this->load->helper('directory');
        $this->load->helper('url');
        $this->load->helper("file");
        $this->load->model('report_m');
    }

    public function index()
    {
        $this->data['reportlist'] = json_decode($this->report_m->getReportListByUser());
        $this->data['subview'] = 'admin/user/report/report_view';
        $this->load->view("admin/_layout_main", $this->data);

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
        $this->data['subview'] = 'admin/user/report/report_view';
        $this->load->view("admin/_layout_main", $this->data);
    }








}

<?php

class Report_controller extends Admin_Controller{


    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $this->load->helper('simple_html_dom');
        $this->load->helper('pdf_helper');
        $this->data['subview'] = 'admin/user/report_view';
        $this->load->view("admin/_layout_main",$this->data);
    }

    public function pdf($html){
    }

}

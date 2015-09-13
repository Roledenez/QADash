<?php

class Reprt_controller extends Admin_Controller{


    public function __construct(){
        parent::__construct();


    }

    //creates the pdf file from the report view
    public function index(){

        $this->load->helper('simple_html_dom');
        $this->load->helper('pdf_helper');
        $this->data['subview'] = 'admin/user/reprt_view';
        $this->load->view("admin/_layout_main",$this->data);
    }

    public function pdf($html){



    }

}

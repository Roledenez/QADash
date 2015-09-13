<?php

class Reportpage_controller extends Admin_Controller{


    public function __construct(){
        parent::__construct();

        $this->load->helper('pdf_helper');

    }

    public function index(){

        $this->load->helper('simple_html_dom');
        $this->load->helper('pdf_helper');

        $this->load->view("admin/user/report",$this->data);
    }



}

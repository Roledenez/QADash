<?php

class Base_controller extends Manager_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
    }

    public function index() {
        $this->data['projects'] = null;
        $this->data['subview'] = 'manager/user/base_view';
        $this->load->view("manager/_layout_main", $this->data);
    }
    public function loadView()
    {
        $pid =$this->session->userdata('project_id');
        $this->data['projects'] = $this->chart_model->get_projectDetails($pid);
        $this->data['subview'] = 'manager/user/base_view';
        $this->load->view("manager/_layout_main", $this->data);
    }
}



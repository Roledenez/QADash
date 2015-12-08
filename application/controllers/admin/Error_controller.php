<?php

class Error_controller extends Admin_Controller{
     public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['subview'] = 'admin/user/error_view';
        $this->load->view("admin/_layout_main", $this->data);
    }
}

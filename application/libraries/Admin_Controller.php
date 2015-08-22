<?php
	class Admin_Controller extends My_Controller{
		function __construct(){
			parent::__construct();
			$this->data['meta_title'] = "my awesome dashboard";
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('user_m');
			$this->load->model('project_m');
			$this->load->helper('url');

			// login check
			$exception_uris =  array(
					'admin/user/login',
					'admin/user/logout'
					);

			if(in_array(uri_string(), $exception_uris) == FALSE){
				if ($this->user_m->loggedin() == FALSE) {
					redirect('admin/user/login');
				}
			}
		}
	}
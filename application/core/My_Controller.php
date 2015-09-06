<?php
	class My_Controller extends CI_Controller{
		public $data = array();
		function __construct(){
			parent::__construct();
			$this->data['meta_title'] = "my awesome dashboard";
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('user_m');
			$this->load->model('chat_m');
			$this->load->model('project_m');
			$this->load->helper('url');

			$this->data['errors'] = array();
			$this->data['site_name'] = config_item('site_name');
		}
	}

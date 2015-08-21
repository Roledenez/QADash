<?php
	class Project extends Admin_Controller{
		public function __construct(){
			parent::__construct();
			var_dump("hello world");
			$d = $this->project_m->getAllProjects();
			// var_dump($d);

		}

		public function index(){
			$this->data['subview'] = 'admin/user/home';
			$this->load->view("admin/_layout_main",$this->data);
		}

	}


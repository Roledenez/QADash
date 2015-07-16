<?php

	class Dashboard extends Admin_Controller{
		public function __constructor(){
			parent::__constructor();

		}

		public function index(){
			$this->data['subview'] = 'admin/user/home';
			$this->load->view("admin/_layout_main",$this->data);
		}

		public function modal(){
			$this->load->view("admin/_layout_modal",$this->data);
		}
	}

<?php

	class Dashboard extends Manager_Controller{
		public function __constructor(){
			parent::__constructor();
		}

		public function index(){
//			$this->data['projects'] = $this->project_m->getAllProjects();
//			$this->data['subview'] = 'manager/user/home';
//			$this->load->view("manager/_layout_main",$this->data);
                    
                        redirect("manager/projectProgress_controller");
		}


	}

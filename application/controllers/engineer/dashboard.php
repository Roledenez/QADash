<?php

	class Dashboard extends Engineer_Controller{
		public function __constructor(){
			parent::__constructor();
		}

		public function index(){
			$this->data['projects'] = $this->project_m->getAllProjects();
			$this->data['subview'] = 'engineer/user/home';
			$this->load->view("engineer/_layout_main",$this->data);
       // redirect("engineer/assignedToMe_controller");
                }


	}

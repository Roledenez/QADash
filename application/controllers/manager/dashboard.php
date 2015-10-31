<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Dashboard
 * Description : This class handle all the Dashboard related activities
 */
	class Dashboard extends Manager_Controller{
		/**
		 * @author : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of Dashboard class
		 */
		public function __constructor(){
			parent::__constructor();
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : index
		 * Description : This function redirect the user to home subview
		 */
		public function index(){
//			$this->data['projects'] = $this->project_m->getAllProjects();
//			$this->data['subview'] = 'manager/user/home';
//			$this->load->view("manager/_layout_main",$this->data);
                    
                        redirect("manager/projectProgress_controller");
		}


	}

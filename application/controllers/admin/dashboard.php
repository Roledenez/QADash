<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Dashboard
 * Description : This class handle all the Dashboard related activities
 */
	class Dashboard extends Admin_Controller{
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
			$this->data['projects'] = $this->project_m->getAllProjects();
			$this->data['subview'] = 'admin/user/home';
			$this->load->view("admin/_layout_main",$this->data);
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : modal
		 * @deprecated This Method deprecated since iteration 2
		 * Description : This function view the modal view
		 *
		 */
		public function modal(){
			$this->load->view("admin/_layout_modal",$this->data);
		}
	}

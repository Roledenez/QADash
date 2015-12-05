<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Project
 * Description : This class handle all the project related activities
 */

	class Project extends Admin_Controller{
		/**
		 * @author : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of project class
		 */
		public function __construct(){
			parent::__construct();
//			var_dump("hello world");
			$d = $this->project_m->getAllProjects();
			 var_dump($d);

		}

		/**
		 * @author : Roledene
		 * Type : function
		 * Name : index
		 * Description : this is the default construtor of User class
		 */
		public function index(){
			$this->data['subview'] = 'admin/user/home';
			$this->load->view("admin/_layout_main",$this->data);
		}

//		public function getProjects()
//		{
//			echo $this->project_m->getProjectsByUser('Hot Bug Fix');
//
//		}

//		public function testForm()
//		{
//			echo $this->input->post('projectName');
//		}

	}


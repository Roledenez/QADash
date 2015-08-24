<?php
		/*
		 * Auther : Roledene
		 * Type : class
		 * Name : ResetPassword
		 * Description : This class handle the password reset operations
		 */
	class passwordReset extends My_Controller{
		/*
		 * Auther : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of ResetPassword class
		 */
		public function __construct(){
			parent::__construct();


		}
		public function index(){
			$this->data['subview'] = 'password_reset';
			$this->load->view('_layout_modal',$this->data);
		}
		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : login
		 * Description : This function validate the username, password and user role, then redirect to the redirect to the relavent UI
		 */
		// public function login(){
		// 	$dashboard = '';//controller path

		// 	// first check user already logged in, then redirect to the relavent dashboard UI
		// 	if ($this->user_m->loggedin() == TRUE) {
		// 	    redirect($this->getDashboardPath());
		// 	}

		// 	//get the rules where decleared in user_m model class
		// 	$rules = $this->user_m->rules;
		// 	//validate the form
		// 	$this->form_validation->set_rules($rules);
		// 	//run the validating
		// 	if ($this->form_validation->run($rules) == TRUE) {
		// 		//all the form validating are correct, check the valid credintials
		// 		if($this->user_m->login() == TRUE){
		// 			redirect($dashboard); // redirect to the dashboard
		// 		}else{
		// 			// if login failed, send the error message
		// 			$this->session->set_flashdata('error','That email/password combination does not exist');
		// 			redirect('login/login','refresh');
		// 		}
		// 	}
		// 	$this->data['subview'] = 'login';
		// 	$this->load->view('_layout_modal',$this->data);
		// }

	}


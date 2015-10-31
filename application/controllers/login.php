<?php

/**
 * @author : Roledene
		 * Type : class
		 * Name : login
		 * Description : This class handle the login authentication
		 */
	class Login extends Admin_Controller{
		/**
		 * @author : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of login class
		 */
		public function __construct(){
			parent::__construct();
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : login
		 * Description : This function validate the username, password and user role, then redirect to the redirect to the relavent UI
		 */
		public function login(){
			$dashboard = '';//controller path
			// first check user already logged in, then redirect to the relavent dashboard UI
			if ($this->user_m->loggedin() == TRUE) {
			    redirect($this->getDashboardPath());
			}

			//get the rules where decleared in user_m model class
			$rules = $this->user_m->rules;
			//validate the form
			$this->form_validation->set_rules($rules);
			//run the validating
			if ($this->form_validation->run($rules) == TRUE) {
				//all the form validating are correct, check the valid credintials
				if($this->user_m->login() == TRUE){
					redirect($dashboard); // redirect to the dashboard
				}else{
					// if login failed, send the error message
					$this->session->set_flashdata('error','That email/password combination does not exist');
					redirect('login/login','refresh');
				}
			}
			$this->data['subview'] = 'login';
			$this->load->view('_layout_modal',$this->data);
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : getDashboardPath
		 * Description : This method returns which dashboard to redirect the logged in user based on user role.
		 */
		public function getDashboardPath(){
			$dashboard = '';
			// get the user role in session
			$role = $this->session->userdata('role');
			if (isset($role)) {
			switch ($role) {
						case 'admin':
							$dashboard = 'admin/base_controller'; //'admin/dashboard';
							break;
						case 'manager':
							$dashboard = 'manager/base_controller';
							break;
						case 'engineer':
							$dashboard = 'engineer/base_controller';
							break;
						case 'intern':
							$dashboard = 'engineer/dashboard';
							break;

						default:
							# code...
							break;
					}
					return $dashboard;
			}else{
				return null;
			}
		}

		/**
		 * @author : Roledene
		 * Type : method
		 * Name : logout
		 * Description : This method unset the logged in session
		 */
		public function logout(){
			$this->user_m->logout();
			redirect('login/login');
		}
	}


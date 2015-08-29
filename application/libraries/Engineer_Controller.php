<?php
			/*
			 * Auther : Roledene
			 * Type : class
			 * Name : Enginner_Controller
			 * Description : This class represent all the enginners, all the enginners roles
		 	 */
	class Engineer_Controller extends My_Controller{
			/*
			 * Auther : Roledene
			 * Type : constructor
			 * Name : __construct
			 * Description : This is the default construtor, This will check the use has valied login session and redirect to relavent url
		 	 */
		function __construct(){
			parent::__construct();

			// login check, ignore these urls
			$exception_uris =  array(
					'login/login',
					'login/logout'
					);

			//ignore the above urls
			if(in_array(uri_string(), $exception_uris) == FALSE){
				// This 'if' condition checks, user is already logged in and the user role is 'manager' or 'admin'
				if ( !($this->user_m->loggedin() == TRUE && ( strcmp($this->session->userdata('role'), 'manager') == 0 || strcmp($this->session->userdata('role'), 'admin') == 0 || strcmp($this->session->userdata('role'), 'engineer') == 0 || strcmp($this->session->userdata('role'), 'intern') == 0 ) ) ) {
					redirect('login/login');
				}
			}
		}
	}
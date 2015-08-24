<?php
			/*
			 * Auther : Roledene
			 * Type : class
			 * Name : Admin_Controller
			 * Description : This class represent all the project managers, all the project admin roles
		 	 */
	class Admin_Controller extends My_Controller{
			/*
			 * Auther : Roledene
			 * Type : constructor
			 * Name : __construct
			 * Description : This is the default construtor, This will check the use has valied login session and redirect to relavent url
		 	 */
		function __construct(){
			parent::__construct();
			// login check
			$exception_uris =  array(
					'login/login',
					'login/logout'
					);

			if(in_array(uri_string(), $exception_uris) == FALSE){
				// check user has valid loging session and his user role is admin
				if ( !( $this->user_m->loggedin() == TRUE && strcmp($this->session->userdata('role'), 'admin') == 0) ) {
					redirect('login/login');
				}
			}
		}
	}
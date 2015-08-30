<?php
		/*
		 * Auther : Roledene
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class Users extends Admin_Controller{
		/*
		 * Auther : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of User class
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : add
		 * Description : This function add a new user to the system
		 */
		public function add(){
			$dashboard = '';//controller path

		$this->user_m->rules = array(
				'first-name' => array('field'=>'fname',
								'label'=>'First Name',
								'rules'=>'trim|required'
								),
				'last-name' => array('field'=>'lname',
								'label'=>'Last Name',
								'rules'=>'trim|required'
								),
				'username' => array('field'=>'username',
								'label'=>'Username',
								'rules'=>'trim|required'
								),
				'email' => array('field'=>'email',
								'label'=>'Email',
								'rules'=>'trim|required|valid_email'
								),
				'password' => array('field'=>'password',
									'label'=>'Password',
									'rules'=>'trim|required'
									)
			);

			$rules = $this->user_m->rules;
			//validate the form
			$this->form_validation->set_rules($rules);
			//run the validating
			if ($this->form_validation->run($rules) == TRUE) {
				$id = $this->user_m->addUser("users","users_id");
					redirect("admin/users/showUsers");
			}

			$this->data['subview'] = 'admin/user/addNewUsers';
			$this->load->view('admin/_layout_main',$this->data);
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : showUsers
		 * Description : This function route to the all users sub view
		 */
		public function showUsers(){
			$users = $this->user_m->get();
			$this->data['subview'] = 'admin/user/allUsers';
			$this->data['users'] = $users;
			$this->load->view('admin/_layout_main',$this->data);
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : showProfile
		 * Description : This function route to the user profile
		 */
		// public function showProfile(){

		// 	$this->data['subview'] = 'engineer/user/profile';
		// 	var_dump("expression");
		// 	if (strcmp($this->session->userdata('role'), 'admin') == 0) {
		// 		$this->load->view('admin/_layout_main',$this->data);
		// 	}elseif (strcmp($this->session->userdata('role'), 'manager') == 0) {
		// 		$this->load->view('manager/_layout_main',$this->data);
		// 	}elseif (strcmp($this->session->userdata('role'), 'engineer') == 0 || strcmp($this->session->userdata('role'), 'intern') == 0) {
		// 		$this->load->view('engineer/_layout_main',$this->data);
		// 	}
		// }

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : update
		 * Description : This function update the user profile
		 */
		// public function update(){

		// 	$this->user_m->rules = array(
		// 		'first-name' => array('field'=>'fname',
		// 						'label'=>'First Name',
		// 						'rules'=>'trim|required'
		// 						),
		// 		'last-name' => array('field'=>'lname',
		// 						'label'=>'Last Name',
		// 						'rules'=>'trim|required'
		// 						),
		// 		// 'username' => array('field'=>'username',
		// 		// 				'label'=>'Username',
		// 		// 				'rules'=>'trim|required'
		// 		// 				),
		// 		'email' => array('field'=>'email',
		// 						'label'=>'Email',
		// 						'rules'=>'trim|required|valid_email'
		// 						),
		// 		'password' => array('field'=>'password',
		// 							'label'=>'Password',
		// 							'rules'=>'trim|required'
		// 							),
		// 		'confirmpassword' => array('field'=>'confirmpassword',
		// 							'label'=>'Confirm Password',
		// 							'rules'=>'trim|required'
		// 							)
		// 	);

		// 	$rules = $this->user_m->rules;
		// 	//validate the form
		// 	$this->form_validation->set_rules($rules);
		// 	//run the validating
		// 	if ($this->form_validation->run($rules) == TRUE) {
		// 		$id = $this->user_m->update("users","users_id");
		// 			redirect("admin/users/showUsers");
		// 	}

		// 			// redirect("admin/users/showProfile");
		// 	$this->data['subview'] = 'engineer/user/profile';
		// 	$this->load->view('admin/_layout_main',$this->data);

		// }

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : changeRole
		 * Description : This function update the user role
		 */
		public function changeRole(){

				$id = $this->user_m->update("users","users_id");
				if(isset($id)){
					redirect("admin/users/showUsers");
				}
		}


	}


<?php
		/*
		 * Auther : Roledene
		 * Type : class
		 * Name : User_m
		 * Description : This class represent the user model
		 */
	class User_m extends My_Model{
		protected $_table_name = "users";
		protected $_order_by = "";
		// rules for the login imput fields
		public $rules = array(
				'email' => array('field'=>'email',
								'label'=>'Email',
								'rules'=>'trim|required|valid_email'
								),
				'password' => array('field'=>'password',
									'label'=>'Password',
									'rules'=>'trim|required'
									)
			);
		protected $_timestamps = FALSE;

		/*
		 * Auther : Roledene
		 * Type : constructor
		 * Name : __construct
		 * Description : Default construtor for User_m class
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : login
		 * Description : This method validate the username and password with databse values and create the session
		 */
		public function login(){
			// get the user with given email and password
			$user = $this->get_by(array(
				'email' => $this->input->post('email'),
				'password' => $this->hash($this->input->post('password'))
				),TRUE);
			//if user found do the following, otherwise do nothing
			if (count($user)) {
				//log in user
				$data  = array(
					'uid' => $user->users_id,
					'fname' => $user->firstName,
					'lname' => $user->lastName,
					'username' => $user->uername,
					'email' => $user->email,
					'id' => $user->users_id,
					'role' => $user->role,
					'loggedin' => TRUE
					);
				// create the login session with above details
				$this->session->set_userdata($data);

			}
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : logout
		 * Description : Destroy the login session
		 */
		public function logout(){
			$this->session->sess_destroy();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : loggedin
		 * Description : This function return TRUE, if loggin session already created, otherwise return false
		 */
		public function loggedin(){
			return (bool) $this->session->userdata('loggedin');
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : hash
		 * Description : This function concatinate given string with configuration key and hash using SHA512 algorithem
		 */
		public function hash($string){
			return hash('sha512', $string.config_item('encryption_key'));
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : addUser
		 * Description : This method add a new user to the system
		 */
		public function addUser($tableName,$primaryKey){

			$this->user_m->_table_name = $tableName;
			$this->user_m->_primary_key = $primaryKey;

			$id = $this->save(array(
				'firstName' => $this->input->post('fname'),
				'lastName' => $this->input->post('lname'),
				'uername' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'password' => $this->hash($this->input->post('password'))
				));
			return $id;
		}

				/*
		 * Auther : Roledene
		 * Type : method
		 * Name : addUser
		 * Description : This method add a new user to the system
		 */
		public function update($tableName,$primaryKey){

			$this->user_m->_table_name = $tableName;
			$this->user_m->_primary_key = "users_id";
			$id = $this->save(array(
				'firstName' => $this->input->post('fname'),
				'lastName' => $this->input->post('lname'),
				// 'uername' => $this->session->userdata('username'),
				'role' => $this->session->userdata('role'),//"admin";//$this->input->post('role'),
				'email' => $this->input->post('email'),
				'password' => $this->hash($this->input->post('password'))
				),$this->session->userdata('uid'));
			return $id;
		}

	}


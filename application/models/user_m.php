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
					'password' => $user->password,
					'loggedin' => TRUE
					);
				// create the login session with above details
				$this->session->set_userdata($data);

			}

			$this->saveSessionData($data['uid']);
		}

		public function saveSessionData($userID)
		{
			
            $start_time = date("h:i:sa");
            $start_date = date("Y-m-d");

				$abc = array(
						'session_id' => session_id(),
						'ip_address' => $this->input->ip_address(),	
						'session_start_date' =>$start_date,					
						'session_start' => $start_time,
						'session_end_date' => '0000-00-00',
						'session_end' => '', 
						'users_id' => $userID
					);

			$this->db->insert('sessions', $abc);

		}

		function updateSessionData(){

            $end_time = date("h:i:sa");
            $end_date = date("Y-m-d");


			$def = array(
						'session_end_date' => $end_date,
						'session_end' => $end_time
				);


			$this->db->where('session_id', session_id());
			$this->db->update('sessions', $def);
}

		/* 
		 * Auther : Roledene
		 * Type : method
		 * Name : logout
		 * Description : Destroy the login session
		 */
		public function logout(){
			
			$this->updateSessionData();
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
			$this->user_m->_primary_key = $primaryKey;

			if($this->input->post('id') !== null ){
			$user = $this->get_by(array(
				'users_id' => $this->input->post('id'),
				),TRUE);
			}

			$id = $this->save(array(
				'firstName' => $this->input->post('fname') !== null ? $this->input->post('fname') : $user->firstName,
				'lastName' => $this->input->post('lname') !== null ? $this->input->post('lname') : $user->lastName,
				'uername' => $this->input->post('username') !== null ? $this->input->post('username') : $user->uername,
				// 'role' => $this->session->userdata('role') !== null ? $this->session->userdata('role') : $user->role,//"admin";//$this->input->post('role'),
				'role' => $this->input->post('role') !== null ? $this->input->post('role') : $user->role,//"admin";//$this->input->post('role'),
				'email' => $this->input->post('email') !== null ? $this->input->post('email') : $user->email,
				'password' => $this->input->post('password') !== null ? $this->hash($this->input->post('password')) : $user->password
				),$this->input->post('id') !== null ? $this->input->post('id') : $this->session->userdata('uid'));
			return $id;
		}

	}


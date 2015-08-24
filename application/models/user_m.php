<?php
	class User_m extends My_Model{
		protected $_table_name = "users";
		protected $_order_by = "";
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

		public function __construct(){
			parent::__construct();
		}

		public function login(){
			$user = $this->get_by(array(
				'email' => $this->input->post('email'),
				'password' => $this->hash($this->input->post('password'))
				),TRUE);
			if (count($user)) {
				//log in user
				$data  = array(
					'fname' => $user->firstName,
					'lname' => $user->lastName,
					'email' => $user->email,
					'id' => $user->users_id,
					'role' => $user->role,
					'loggedin' => TRUE
					);
				$this->session->set_userdata($data);
			}
		}
		public function logout(){
			$this->session->sess_destroy();
		}
		public function loggedin(){
			return (bool) $this->session->userdata('loggedin');
		}

		// public function getRole(){
		// 	$role = ;
		// }
		public function hash($string){
			return hash('sha512', $string.config_item('encryption_key'));
		}

	}


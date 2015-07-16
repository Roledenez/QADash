<?php
	class Migration extends Admin_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->library('migration');
			echo $this->migration->current();
			if ($this->migration->current() === FALSE){
				show_error($this->migration->error_string());
			}else{
				echo "migration works";
			}
		}
	}
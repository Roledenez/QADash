<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Migration
 * @deprecated this Class deprecated in Release 2.0.0
 * Description : This class handle the database migration
 */
	class Migration extends Admin_Controller{

		public function __construct(){
			parent::__construct();
		}

		/**
		 * @author : Roledene
		 * Type : class
		 * Name : index
		 * @deprecated  deprecated method
		 * Description : --
		 */
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
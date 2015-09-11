<?php
		/*
		 * Auther : Binalie
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class projectLoader_c extends Admin_Controller{
		/*
		 * Auther : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of User class
		 */
		public function __construct(){
			parent::__construct();                        
                        $this->load->model("projectLoader_m");
		}

                /*
		 * Auther : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the all users sub view
		 */
                
                public function index(){                    
                    $this->data['result'] = $this->projectLoader_m->displayAllProjects();
                    $this->data['subview'] = 'admin/user/projectLoader_v';
                    $this->load->view('admin/_layout_main',$this->data);
		}
                
		public function modal(){
			$this->load->view("admin/_layout_modal",$this->data);
		}
                

	}


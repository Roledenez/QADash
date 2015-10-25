<?php
        /*
         * Author : Binalie
         * Type : class
         * Name : projectLoader_c
         * Description : This class handle all the projects related activities
         */
	class projectLoader_c extends Admin_Controller
        {
		/*
		 * Author : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of projectLoader_c class
		 */
		public function __construct()
                {
                    parent::__construct();                        
                    $this->load->model("projectLoader_m");
		}

                /*
		 * Author : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the sub view
		 */
                
                public function index()
                {                    
                    $this->data['result'] = $this->projectLoader_m->displayAllProjects();
                    $this->data['subview'] = 'admin/user/projectLoader_v';
                    $this->load->view('admin/_layout_main',$this->data);
		}
                
		public function modal()
                {
			$this->load->view("admin/_layout_modal",$this->data);
		}              
	}


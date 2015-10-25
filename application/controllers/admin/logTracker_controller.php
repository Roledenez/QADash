<?php
        /*
         * Author : Binalie
         * Type : class
         * Name : logTracker_controller
         * Description : This class handle all the user logging related activities
         */
	class logTracker_controller extends Admin_Controller
        {
		/*
		 * Author : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of logTracker_controller class
		 */
		public function __construct()
                {
                    parent::__construct();                        
                    $this->load->model("logTracker_model");
		}

                /*
		 * Author : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the sub view
		 */
                
                public function index()
                {                    
                    $this->data['result'] = $this->logTracker_model->displaySessionData();
                    $this->data['subview'] = 'admin/user/logTracker_view';
                    $this->load->view('admin/_layout_main',$this->data);
		}
                
		public function modal()
                {
                    $this->load->view("admin/_layout_modal",$this->data);
		}
                

	}


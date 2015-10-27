<?php
        /*
         * Author : Binalie
         * Type : class
         * Name : projectLoader_c
         * Description : This class handle all the projects related activities
         */
	class viewIssueDetails_c extends Admin_Controller
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
            $this->load->model("viewIssueDetails_m");                    
		}

        /*
		 * Author : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the sub view
		 */
                
        public function index()
        {                  
        	$pid = $this->session->userdata('project_id');
        	$issue_id = $_GET['var'];
        	$this->data['issueDetails'] = $this->viewIssueDetails_m->loadIssueDetails($issue_id,$pid);
            $this->data['subview'] = 'admin/user/viewIssueDetails_v';
            $this->load->view('admin/_layout_main',$this->data);

		}
                
		
	}


<?php
        /*
         * Author : Binalie
         * Type : class
         * Name : projectLoader_c
         * Description : This class handle all the projects related activities
         */
	class viewAllIssues_c extends Admin_Controller
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
            $this->load->model("viewAllIssues_m");                    
            $this->load->model("createIssue_m");  
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
            echo $pid;

        	$this->load->library('form_validation');
            
        	$this->data['versions'] = $this->createIssue_m->loadVersions();
            $this->data['issues'] = $this->viewAllIssues_m->loadAllIssues();
            
            $this->data['subview'] = 'admin/user/viewAllIssues_v';
            $this->load->view('admin/_layout_main',$this->data);



		}  

        public function filterIssues()
        {
            echo "kkkkk";
            $this->data['issueDetails'] = $this->viewAllIssues_m->filterIssuesByPriority();
            $this->data['subview'] = 'admin/user/viewAllIssues_v';
            $this->load->view('admin/_layout_main',$this->data);
        }             
		
	}


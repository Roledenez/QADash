<?php
    /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@class name   View_all_issues_controller
     *@desciption   display all issues controller
     */
	class View_all_issues_controller extends Engineer_Controller
    {
		/**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  constructor
         *@desciption   constructor of view all issues controller
         */
		public function __construct()
        {
            parent::__construct();     

            //load the model class of view all issues controller                   
            $this->load->model("View_all_issues_model");   

            //load the model class of create issue controller                 
            $this->load->model("Create_issue_model");  
		}

        /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  index
         *@parameters   no parameters
         *@desciption   index function of view all issues controller
         */                
        public function index()
        {   
            //get all the issues created by the signed in user
            $this->data['issues'] = $this->View_all_issues_model->load_all_issues();    

            //load the view of view all issues        
            $this->data['subview'] = 'engineer/user/View_all_issues_view';
            $this->load->view('engineer/_layout_main',$this->data);            
		}  

        /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  filter_issues
         *@parameters   no parameters
         *@desciption   filters the listed issues according to the user specifications
         */  
        public function filter_issues()
        {            
            //get the project id of the currently selected project
            $pid = $this->session->userdata('project_id');

            //get the value selected by the user for status
            $status = $this->input->post('status');  

            //get the value selected by the user for priority
            $priority = $this->input->post('priority');
             
            //get the value selected by the user for issue type
            $issue_type = $this->input->post('issueType');

            //if the user has not selected any value from the dropdowns load all the issues created by the signed in user...
            if (($status == null) && ($priority == null) && ($issue_type == null)) 
            {
                $this->data['issues'] = $this->View_all_issues_model->load_all_issues(); 
            }
            else if (($status != null) && ($priority != null) && ($issue_type == null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_priority_and_status($pid, $priority, $status);
            }
            else if (($status != null) && ($priority == null) && ($issue_type != null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_status_and_issue_type($pid, $status, $issue_type);
            }
            else if (($status == null) && ($priority != null) && ($issue_type != null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_priority_and_issue_type($pid, $priority, $issue_type);
            }
            else if (($status != null) && ($priority == null) && ($issue_type == null))
            {                  
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_status($pid, $status);
            }
            else if (($status == null) && ($priority != null) && ($issue_type == null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_priority($pid, $priority);
            }
            else if (($status == null) && ($priority == null) && ($issue_type != null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_issue_type($pid, $issue_type);
            }      
            else if (($status != null) && ($priority != null) && ($issue_type != null))
            {
                $this->data['issues'] = $this->View_all_issues_model->filter_issues_by_status_priority_issue_type($pid, $status, $priority, $issue_type);
            }

            //load the view
            $this->data['subview'] = 'engineer/user/View_all_issues_view';
            $this->load->view('engineer/_layout_main',$this->data);
        }             
		
	}


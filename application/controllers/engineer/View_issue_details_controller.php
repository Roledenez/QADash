<?php
     /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@class name   View_issue_details_controller
     *@desciption   display selected issue details
     */
	class View_issue_details_controller extends Admin_Controller
    {

		/**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  constructor
         *@desciption   constructor of view issue details controller
         */
		public function __construct()
        {
            parent::__construct();        
            //load the model class                
            $this->load->model("View_issue_details_model");             
                            
		}

        /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  index
         *@parameters   no parameters
         *@desciption   index of view issue details controller
         */                
        public function index()
        {    
            //get the project id of the currently selected project
        	$pid = $this->session->userdata('project_id');

            //get the issue code selected by the user to view details
          	$issue_id = $_GET['var']; 

        	//load all the users
        	$this->data['users'] = $this->View_issue_details_model->load_users($pid);

            //load all the issue details
        	$this->data['issueDetails'] = $this->View_issue_details_model->load_issue_details($issue_id,$pid);

            //load the view 
            $this->data['subview'] = 'engineer/user/View_issue_details_view';
            $this->load->view('engineer/_layout_main',$this->data);
		}
		
        /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  delete_issue
         *@parameters   $issue_code(issue code of the issue to be selected to be deleted)
         *@desciption   updates field availability_status in database
         */  
		public function delete_issue($issue_code)
		{				
            //create the array with values to be sent to database
			$data = array(
				'availability_status' => 0
				);
			$this->load->model("View_issue_details_model");
			$this->View_issue_details_model->delete_issue($issue_code, $data);
			redirect('engineer/View_all_issues_controller');
		}

        /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  delete_issue
         *@parameters   $issue_code(issue code of the issue to be selected to be deleted)
         *@desciption   updates field availability_status in database
         */  
        public function delete_multiple_issue($issue_code)
        {               
            //create the array with values to be sent to database
            $data = array(
                'availability_status' => 0
                );
            $this->load->model("View_issue_details_model");
          
            $this->View_issue_details_model->delete_issue($issue_code, $data);
        }
        
         /**
         *
         * @package     application
         * @category    controller
         * @author      Binalie Liyanage 
         *@method name  update_issue
         *@parameters   no parameters
         *@desciption   updates the issue details entered by the user
         */ 
        public function update_issue()
        {        	
            // echo "<script>alert('stupid Binalie');</script>";
            // exit;
            //Load the model class of create issue
            $this->load->model('Create_issue_model'); 

            //get the current date
            $current_date = date("Y/m/d");

            //ge the currently selected project_id
            $pid = $this->session->userdata('project_id'); 

            //get the currently logged in user's id           
            $uid = $this->session->userdata('uid');

            //get the name of the logged in user
            $name = $this->Create_issue_model->get_signed_in_user($uid);
            $name = $name[0]->name;

            //create the data Array containing all the fields that can be updated
        	$data = array(
        		'issue_code' => $this->input->post('issueCode'),
                'summary' => $this->input->post('summary'),
                'description' => $this->input->post('description'),                                
                'priority_type' => $this->input->post('priority'),
                'issue_type' => $this->input->post('issueType'),
                'status' => $this->input->post('status'),
                'updated_date' => $currentDate,
                'updated_by' => $name
            );

            //get the issue code of the issue to be updated
        	$issue_code = $this->input->post('issueCode');

            //get the last id of the notification record added
            $notification_id = $this->Create_issue_model->get_last_notification_id($pid);

            //calculate the id of the next record that is to be added
            $current_notification_id = $notification_id[0]->last_notification_id + 1;

            //create new object ofnthe of the Notification_m class
            $nSubject = new Notification_m();

            //call the insertNotification method and send notification on updation
            ////////////////////////dooooooooooooooooooooooooooooooo
            //$nSubject->insertNotification($current_notification_id, $uid, $pid, "Issue ".$issue_code." has been updated!", "You updated the issue ".$issue_code, "Updated", site_url() . "engineer/viewIssueDetails_c/$currId");
            
            //load the View issue details  model class
        	$this->load->model("View_issue_details_model");
        	$this->View_issue_details_model->update_issue($issue_code,$data);

            //if the updation was successful redirect to view all issues controller page
        	redirect('engineer/View_all_issues_controller');
		}
}

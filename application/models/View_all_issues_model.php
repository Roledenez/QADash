<?php
		
    /**
     *
     * @package     application
     * @category    model
     * @author      Binalie Liyanage 
     *@class name   View_all_issues_model
     *@desciption   update and retrieve required details to and from database
     */
	class View_all_issues_model extends My_Model
    {        
        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  constructor
         *@desciption   constructor of view all issues model
         */
		public function __construct()
        {
			parent::__construct();            
                       
		}               
       
        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  load_all_issues
         *@parameters   no parameters
         *@desciption   load all issues with respect to a selected project
         */
        public function load_all_issues()
        {
            //get the project_id of the currently selected project
            $pid = $this->session->userdata('project_id');

            $sql = "SELECT *
                    FROM issue
                    WHERE issue.project_id = $pid AND availability_status = 1";
                        

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_status
         *@parameters   $pid(project id of the selected project),$status(status selected by the user from drop down)
         *@desciption   load all issues with respect to status
         */
        public function filter_issues_by_status($pid,$status)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND status = '".$status."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_priority
         *@parameters   $pid(project id of the selected project),$priority(status selected by the user from drop down)
         *@desciption   load all issues with respect to priority
         */
        public function filter_issues_by_priority($pid,$priority)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND priority_type = '".$priority."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_issue_type
         *@parameters   $pid(project id of the selected project),$issue_type(issue type selected by the user from drop down)
         *@desciption   load all issues with respect to issue type
         */
        public function filter_issues_by_issue_type($pid,$issue_type)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND issue_type = '".$issue_type."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_byPriority_and_status
         *@parameters   $pid(project id of the selected project),priorty(issue type selected by the user from drop down),status(issue type selected by the user from drop down)
         *@desciption   load all issues with respect to priority and status selected by the user
         */
        public function filter_issues_byPriority_and_status($pid, $priority, $status)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND priority_type = '".$priority."' AND status = '".$status."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_priority_and_issue_type
         *@parameters   $pid(project id of the selected project), $priority(priority selected by the user from drop down), $issue_type(issue type selected by the user from drop down)
         *@desciption   load all issues with respect to issue type
         */
        public function filter_issues_by_priority_and_issue_type($pid, $priority, $issue_type)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND priority_type = '".$priority."' AND issue_type = '".$issue_type."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_status_and_issue_type
         *@parameters   $pid(project id of the selected project), $status(priority selected by the user from drop down), $issue_type(issue type selected by the user from drop down)
         *@desciption   load all issues with respect to issue type
         */
        public function filter_issues_by_status_and_issue_type($pid, $status, $issue_type)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND status = '".$status."' AND issue_type = '".$issue_type."'";

            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  filter_issues_by_status_priority_issue_type
         *@parameters   $pid(project id of the selected project), $status(priority selected by the user from drop down), $priority(priority selected by the user from drop down), $issue_type(issue type selected by the user from drop down)
         *@desciption   load all issues with respect to issue type
         */
        public function filter_issues_by_status_priority_issue_type($pid,$status,$priority,$issue_type)
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = $pid AND status = '".$status."' AND priority_type = '".$priority."' AND issue_type = '".$issue_type."'";

            return $this->db->query($sql)->result();
        }

        // public function last_viewed_date($date)
        // {
        //     $sql = "UPDATE issue FROM "
        // }
    }

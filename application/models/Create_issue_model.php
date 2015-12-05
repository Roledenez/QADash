<?php
		
	class Create_issue_model extends My_Model
    {        
        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  constructor
         *@parameters   no parameters
         *@desciption   constructor of the Create_issue_model class
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
         *@method name  create_issue
         *@parameters   $data(array of user entered data sent from the controller)
         *@desciption   insert data sent from the controller to the issue table in the database
         */
        public function create_issue($data)
        {
            $this->db->insert('issue',$data);
        }
        
        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  load_versions
         *@parameters   no parameters
         *@desciption   load versions from the database
         */
        public function load_versions()
        {
            $sql = "SELECT version_code FROM versions WHERE project_id = 1";
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  get_last_issue_id
         *@parameters   $pid(project_id of the currently selected project)
         *@desciption   get the issue id of the last entered issue record
         */
        public function get_last_issue_id($pid)
        {            
            $sql = "SELECT MAX(issue_id) as last FROM issue WHERE issue.project_id = $pid";
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  get_signed_in_user
         *@parameters   $uid(currently signed in users id)
         *@desciption   get the full name of the currently signed in user
         */
        public function get_signed_in_user($uid)
        {
            $sql = "SELECT concat(u.firstName,' ',u.lastName) as name FROM users u WHERE u.users_id = $uid";
            return $this->db->query($sql)->result();            
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  get_last_notification_id
         *@parameters   $pid(project_id of the currently selected project)
         *@desciption   get the notification id of the last entered notification record
         */
        public function get_last_notification_id($pid)
        {
            $sql = "SELECT MAX(id) as last_notification_id FROM notifications WHERE notifications.projectId = $pid";
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  get_project_manager
         *@parameters   $pid(project_id of the currently selected project)
         *@desciption   get the id of the project manager of the selected project
         */
        public function get_project_manager($pid)
        {
            $sql = "SELECT member_id FROM project_member WHERE role='Project Manager' AND project_id=$pid";
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  upload_images
         *@parameters   $dataArray(data array containing the image details)
         *@desciption   insert uploaded image details to the database
         */
        public function upload_images($dataArray)
        {
            $this->db->insert('image_uploads',$dataArray);
        }
    }

<?php
	
    /**
     *
     * @package     application
     * @category    model
     * @author      Binalie Liyanage 
     *@class name   View_issue_details_model
     *@desciption   update and retrieve required details to and from database
     */
	class View_issue_details_model extends My_Model
    {        
        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  constructor
         *@desciption   constructor of view issue details model
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
         *@method name  load_issue_details
         *@parameters   $issue_id(issue id of the selected issue), $pid(project_id of the selected project)
         *@desciption   load issue details relative to provided project id and issue id
         */
        public function load_issue_details($issue_id,$pid)
        {            
            $sql = "SELECT *
                    FROM issue i 
                    WHERE i.project_id = $pid 
                        AND i.issue_id = $issue_id";
                        
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  delete_issue
         *@parameters   $issue_id(issue id of the selected issue), $data(update a field in the database)
         *@desciption   the isse selected will not be deleted from the database but the avalability status will be changed to 0 which says record is unavailable
         */
        public function delete_issue($issue_code, $data)
        {        
            $this->db->where('issue_code', $issue_code);
            $this->db->update('issue', $data); 
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  load_users
         *@parameters   $pid(project_id of the selected project)
         *@desciption   load users relative to provided project id and issue id
         */
        public function load_users($pid)
        {
            $sql = "SELECT concat(u.firstName,' ',u.lastName) AS name
                    FROM project_member pm, users u 
                    WHERE pm.project_id = $pid 
                    AND u.users_id = pm.member_id";                        
                        
            return $this->db->query($sql)->result();
        }

        /**
         *
         * @package     application
         * @category    model
         * @author      Binalie Liyanage 
         *@method name  update_issue
         *@parameters   $issue_code(issue code of the selected issue), $data(update details sent from controller)
         *@desciption   update issue details relative to provided project id and issue code
         */
        public function update_issue($issue_code,$data)
        {
            $this->db->where('issue_code', $issue_code);
            $this->db->update('issue', $data); 
        }

    }

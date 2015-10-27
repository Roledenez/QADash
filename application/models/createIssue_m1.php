<?php
		
	class createIssue_m1 extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}        

        public function createIssue($data)
        {
            $this->db->insert('issue',$data);
        }

        
        public function loadVersions()
        {
            $sql = "SELECT version_code FROM versions WHERE project_id = 1";
            return $this->db->query($sql)->result();
        }

        public function getLastIssueId($pid)
        {
            
            $sql = "SELECT MAX(issue_id) as last FROM issue WHERE issue.project_id = $pid";
            return $this->db->query($sql)->result();
        }

        public function getSignedInUser($uid)
        {
            $sql = "SELECT concat(u.firstName,' ',u.lastName) as name FROM users u WHERE u.users_id = $uid";
            return $this->db->query($sql)->result();            
        }
    }

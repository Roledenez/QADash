<?php
		
	class viewIssueDetails_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}           
        
        public function loadIssueDetails($issue_id,$pid)
        {            
            $sql = "SELECT *
                    FROM issue i 
                    WHERE i.project_id = $pid 
                        AND i.issue_id = $issue_id";
                        
            return $this->db->query($sql)->result();
        }

        public function deleteIssue($issueId)
        {

        }

    }

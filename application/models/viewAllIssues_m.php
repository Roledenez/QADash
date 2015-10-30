<?php
		
	class viewAllIssues_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}               
       
        public function loadAllIssues()
        {
            $pid = $this->session->userdata('project_id');

            $sql = "SELECT *
                    FROM issue
                    WHERE issue.project_id = $pid";
                        

            return $this->db->query($sql)->result();
        }

        public function filterIssuesByPriority()
        {
            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = 1 AND status = 'open'";

            return $this->db->query($sql)->result();
        }
    }

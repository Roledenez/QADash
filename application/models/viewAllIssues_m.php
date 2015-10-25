<?php
		
	class viewAllIssues_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}               
       
        public function loadAllIssues()
        {
            $sql = "SELECT i.issue_id as issue_id,
                    i.issue_code as issue_code, 
                    concat(m.firstName,' ',m.lastName) as issueCreator, 
                    concat(u.firstName,' ',u.lastName) as AssignedTo,
                    i.status as status,
                    i.issue_type as issue_type 
                    FROM issue i, member m, users u 
                    WHERE i.project_id=1 
                        AND i.assignee_id=u.users_id 
                        AND i.created_by=m.member_id";

            return $this->db->query($sql)->result();
        }

        public function filterIssuesByPriority()
        {
            //loadAllIssues();
            //$a = 'open';

            $sql = "SELECT *
                    FROM issue
                    WHERE project_id = 1 AND status = 'open'";

            return $this->db->query($sql)->result();
        }

    }

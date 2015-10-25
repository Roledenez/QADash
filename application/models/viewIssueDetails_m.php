<?php
		
	class viewIssueDetails_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}               
        

        public function loadIssueDetails($issue_id)
        {
            $sql = "SELECT concat(m.firstName,' ',m.lastName) as issueCreator, 
                    concat(u.firstName,' ',u.lastName) as AssignedTo,
                    i.status as status,
                    i.issue_type as issue_type,
                    i.description as description,
                    i.version_code as version_code,
                    i.priority_type as priority_type,
                    i.severity_type as severity_type,
                    i.issue_code as issue_code,
                    i.summary as summary
                    FROM issue i, member m, users u 
                    WHERE i.project_id=1 
                        AND i.assignee_id=u.users_id 
                        AND i.created_by=m.member_id
                        AND i.issue_id = $issue_id";
                        
            return $this->db->query($sql)->result();
        }

    }

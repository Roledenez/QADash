<?php
		/*
		 * Auther : Binalie
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class closedTestcases_m extends My_Model
        {
		/*
		 * Auther : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of projectLoader_m class
		 */
		public function __construct()
                {
			parent::__construct();                       
		}
                
                public function viewClosedTestcases($id)
                {

                    try
                    {
                    $sql_2 = "select tc.testcase_id as testcaseID, "
                            . "tc.description as testcaseDesc, "
                            . "m.member_id as AssigneeID, "
                            . "concat(m.firstname,' ',m.lastname) as name "
                            . "from project_member pm, "
                            . "testsuites as ts, "
                            . "testcase as tc, "
                            . "member m "
                            . "where pm.project_id=ts.project_id "
                            . "and ts.testsuites_id=tc.testsuites_id and"
                            . " m.member_id = tc.member_id and "
                            . "ts.testsuites_id=$id and "
                            . "tc.status=0 "; 

                    return $this->db->query($sql_2, array($id))->result();
                    
//                    $this->db->select('tc.testcase_id as testcaseID, '
//                . 'tc.description as testcaseDesc, '
//                . 'm.member_id as AssigneeID, '
//                . 'concat(m.firstname," ",m.lastname) as name, '
//                . 'tc.status as testcaseStatus');
//        
//                $this->db->from('project_member pm');
//                $this->db->join('testsuites ts','pm.project_id = ts.project_id');
//                $this->db->join('testcase tc','ts.testsuites_id=tc.testsuites_id');
//                $this->db->join('member m','m.member_id = tc.member_id');
//                $this->db->where('ts.testsuites_id',$id);
//                $this->db->where('tc.status',0);
//                $method = "result";
//                $result = $this->db->get()->$method();
//                return $result;
                    }
                    
                    catch(Exception $e)
                    {
                        echo 'Message: ' .$e->getMessage();
                    }
                }
                
                
                

	}


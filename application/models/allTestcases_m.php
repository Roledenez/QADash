 <?php
 /*
 * Author : Binalie
 * Type : class
 * Name : allTestcases_m
 * Description : This class represent the All testcases model
 */
class allTestcases_m extends My_Model 
 {
    /*
     * Author : Binalie
     * Type : constructor
     * Name : __construct
     * Description : Default construtor for allTestcases_m class
     */
    public function __construct()
    {
	parent::__construct();                      
    }
    
    /*
     * Author : Binalie
     * Type : method
     * Name : viewAllTestcases
     * Description : This method give out all the testcases in a selected project
     */
    public function viewAllTestcases($id) 
    {
        
        try
        {
        $sql_1 = "select tc.testcase_id as testcaseID,"
                . "tc.description as testcaseDesc,"
                . "m.member_id as AssigneeID,"
                . "concat(m.firstname,' ',m.lastname) as name, "
                . "tc.status as testcaseStatus from project_member pm,"
                . " testsuites ts,testcase tc, member m "
                . "where pm.project_id=ts.project_id and "
                . "ts.testsuites_id=tc.testsuites_id and "
                . "m.member_id = tc.member_id "
                . "and ts.testsuites_id = $id";
            
        
        return $this->db->query($sql_1, array($id))->result();
        
   
//        $this->db->select('tc.testcase_id as testcaseID, '
//                . 'tc.description as testcaseDesc, '
//                . 'm.member_id as AssigneeID, '
//                . 'concat(m.firstname," ",m.lastname) as name, '
//                . 'tc.status as testcaseStatus');
//        
//        $this->db->from('project_member pm');
//        $this->db->join('testsuites ts','pm.project_id = ts.project_id');
//        $this->db->join('testcase tc','ts.testsuites_id=tc.testsuites_id');
//        $this->db->join('member m','m.member_id = tc.member_id');
//        $this->db->where('ts.testsuites_id',$id);
//        $method = "result";
//        $result = $this->db->get()->$method();
//        return $result;
        }
 
    
    
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
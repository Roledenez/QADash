<?php
class testsuiteDetails_model extends My_Model 
{

    public function __construct()
            {
	parent::__construct();                       
    }

    public function getTestsuitesDetails($id) 
    {
        
        try
        {        
        $sql_1 = "select ts.testsuites_id as testsuitesID,"
                . " ts.project_id as projectID,"
                . " ts.name as testsuiteName,"
                . " ts.description as testsuiteDescription,"
                . " ts.status as testsuiteStatus,"
                . " count(tc.testcase_id) as numTestcases  "
                . "from testsuites ts, testcase tc "
                . "where ts.testsuites_id = tc.testsuites_id "
                . "and ts.project_id = $id"; 

        
        return $this->db->query($sql_1, array($id))->result();
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    } 
    
    public function getClosedTestcases($id)
    {     

        try
        {
        //$sql_2 = "select count(tc.testcase_id) as numClosedTestcases from testcase tc, testsuites ts where ts.testsuites_id = tc.testsuites_id and ts.project_id = $id and tc.status = 0";
        $sql_2 = "select count(tc.testcase_id) as numClosedTestcases "
                . "from testcase tc, testsuites ts "
                . "where ts.testsuites_id = tc.testsuites_id and "
                . "ts.project_id = $id and tc.status = 0";
        
        return $this->db->query($sql_2, array($id))->result();
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    public function getOpenTestcases($id)
    {
       
        try
        {
        //$sql_3 = "select count(tc.testcase_id) as numOpenTestcases from testcase tc, testsuites ts where ts.testsuites_id = tc.testsuites_id and ts.project_id = $id and tc.status = 1";
        $sql_3 = "select count(tc.testcase_id) as numOpenTestcases "
                . "from testcase tc, testsuites ts "
                . "where ts.testsuites_id = tc.testsuites_id and "
                . "ts.project_id = $id and tc.status = 1";
        
        return $this->db->query($sql_3, array($id))->result();
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
}
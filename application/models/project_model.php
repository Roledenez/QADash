<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project_model
 *
 * @author ishara
 */
class project_model extends My_Model{
   
     function getPriority(){
        try {
            $query = "SELECT priority_id, name FROM `priority`";

            $result = $this->db->query($query);
            foreach ($result->result_array() as $row) {
                $data[$row['priority_id']] = $row['name'];
            }
            return $data;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function getUserList($pid){
        try {
            $query = "SELECT u.users_id, u.uername FROM users u, project_member p WHERE u.users_id=p.member_id and p.project_id='$pid'";

            $result = $this->db->query($query);
            foreach ($result->result_array() as $row) {
                $data[$row['users_id']] = $row['uername'];
            }
            return $data;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function addProject($data) {

        $this->db->insert('project',$data);
    }
    
     function get_projectDetails($pid) {
        $query = "SELECT p.project_id, p.name, p.status, p.prority_id, p.starting_date, p.ending_date, pr.name as pname FROM project p, priority pr WHERE p.prority_id = pr.priority_id and p.project_id ='$pid'";
        $result = $this->db->query($query);
        return $result->result();
    }
    function get_TestCaseDetails($pid){
        $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' ORDER BY ts.testsuites_code";
        $result = $this->db->query($query);
        return $result->result();
    }
    function get_TestSuiteDetails($pid){
        $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid' ";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    function get_TestStepDetails($tcID){
        $query = "SELECT testcaseStep_id,testcase_id, description, expectedResult FROM testcase_step WHERE testcase_id = $tcID ";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function addTestSuite($data) {

        $this->db->insert('testsuites',$data);
    }
    
    public function addTestCase($data) {

        $this->db->insert('testcase',$data);
    }
    
    public function addTestStep($data) {

        $this->db->insert('testcase_step',$data);
    }
    
    function get_TestSuiteToAssign($pid){
        $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid'";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    function get_TestCaseToAssign($pid, $tsid){
        $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Review Passed'";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    function updateTCAssign($data,$tcID){
        $this->db->where('testcase_id', $tcID);
        $this->db->update('testcase', $data); 
    }
    
  
}

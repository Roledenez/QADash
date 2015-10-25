<?php

class Chart_model extends My_Model {    

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_data() {
        $this->db->select('pname, failedTC, passedTC');
        $this->db->from('charts');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_barchartdata() {
         $this->db->select('Pname, issues, testcases');
        $this->db->from('charts');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_piechartdata() {
        $this->db->select('COUNT(member_id), project_id');
        $this->db->from('project_member');
        $this->db->group_by("project_id"); 
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_columnchartdata() {
        $this->db->select('Pname, totalhours, spentours');
        $this->db->from('charts');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_projectTime() {
        $this->db->select('name,description,status,prority_id, progress,totalhours, spentours');
        $this->db->from('project');
        $query = $this->db->get();

        return $query->result();
    }
   function get_projectDetails($pid) {
        $query = "SELECT p.project_id, p.name, p.status,p.starting_date,p.ending_date, p.prority_id FROM project p, priority pr WHERE p.prority_id = pr.priority_id AND p.project_id = '$pid'";
        $result = $this->db->query($query);
        return $result->result();
    }
    function getFinishedCount($pid){
        
        $query = "SELECT COUNT(tc.testcase_id) done from testcase tc, testsuites ts WHERE tc.testsuites_id=ts.testsuites_id and tc.open=0 and ts.project_id = '$pid'";
        $result = $this->db->query($query);
        $x = $result->result();
        return $x[0]->done;
    }
    function getNotFinishedCount($pid){
        
        $query = "SELECT COUNT(tc.testcase_id) notDone from testcase tc, testsuites ts WHERE tc.testsuites_id=ts.testsuites_id and ts.project_id = '$pid' and tc.open=1";
        $result = $this->db->query($query);
        $x = $result->result();
        return $x[0]->notDone;
    }
    
    function getProjectName($pid) {
        try {
            $this->db->select('name');
            $this->db->from('project');
            $this->db->where('project_id', $pid);
            $query = $this->db->get();
            $x = $query->result();
            return $x[0]->name;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
}
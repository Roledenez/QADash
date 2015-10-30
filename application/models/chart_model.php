<?php

class Chart_model extends My_Model {

    function __construct() {
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
        try {
            $this->db->select('name,description,status,prority_id, progress,totalhours, spentours');
            $this->db->from('project');
            $query = $this->db->get();

            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_projectDetails
     * Description : get project details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get project details
     * @return project details
     */
    function get_projectDetails($pid) {
        try {
            $query = "SELECT p.project_id, p.name, p.status,p.starting_date,p.ending_date, p.prority_id FROM project p, priority pr WHERE p.prority_id = pr.priority_id AND p.project_id = '$pid'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getFinishedCount
     * Description : get closed test case count
     *
     * @param  $pid - project ID
     * @throws Exception if can not get the count
     * @return closed test case count
     */
    function getFinishedCount($pid) {
        try {
            $query = "SELECT COUNT(tc.testcase_id) done from testcase tc, testsuites ts WHERE tc.testsuites_id=ts.testsuites_id and tc.open=0 and ts.project_id = '$pid'";
            $result = $this->db->query($query);
            $x = $result->result();
            return $x[0]->done;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getNotFinishedCount
     * Description : get open test case count
     *
     * @param  $pid - project ID
     * @throws Exception if can not get the count
     * @return open test case count
     */
    function getNotFinishedCount($pid) {
        try {
            $query = "SELECT COUNT(tc.testcase_id) notDone from testcase tc, testsuites ts WHERE tc.testsuites_id=ts.testsuites_id and ts.project_id = '$pid' and tc.open=1";
            $result = $this->db->query($query);
            $x = $result->result();
            return $x[0]->notDone;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getProjectName
     * Description : get project name of given project
     *
     * @param  $pid - project ID
     * @throws Exception if can not get the result
     * @return project name
     */
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
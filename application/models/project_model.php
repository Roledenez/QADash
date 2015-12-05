<?php

/**
 * Description of project_model
 *
 * @author ishara
 */
class project_model extends My_Model {

    /**
     * Name : getPriority
     * Description : get priority details for dropdown
     *
     * @throws Exception If can not get the result
     * @return priority details
     */
    function getPriority() {
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

    /**
     * Name : getUserList
     * Description : get user details 
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return user id , user name
     */
    function getUserList($pid) {
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

    /**
     * Name : addProject
     * Description : add new project to database
     *
     * @param  $data - project details
     * @throws Exception If can not get the result
     */
    public function addProject($data) {
        try {
            $this->db->insert('project', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_projectDetails
     * Description : get project details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return project details
     */
    function get_projectDetails($pid) {
        try {
            $query = "SELECT p.project_id, p.name, p.status, p.prority_id, p.starting_date, p.ending_date, pr.name as pname FROM project p, priority pr WHERE p.prority_id = pr.priority_id and p.project_id ='$pid'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_TestCaseDetails
     * Description : get get_TestCase details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return get_TestCase details
     */
    function get_TestCaseDetails($pid) {
        try {
            $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' and tc.psb_status = 'Assigned To Review' ORDER BY ts.testsuites_code";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_TestSuiteDetails
     * Description : get Test suite details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return test suite details
     */
    function get_TestSuiteDetails($pid) {
        try {
            $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid' ";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_TestStepDetails 
     * Description : get test step details
     *
     * @param  $tcID - test case ID
     * @throws Exception If can not get the result
     * @return test step details
     */
    function get_TestStepDetails($tcID) {
        try {
            $query = "SELECT testcaseStep_id,testcase_id, description, expectedResult FROM testcase_step WHERE testcase_id = $tcID ";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

     /**
     * Name : addTestSuite
     * Description : add new test suite to database
     *
     * @param  $data - test suite details
     * @throws Exception If can not get the result
     */
    public function addTestSuite($data) {
        try {
            $this->db->insert('testsuites', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : addTestCase
     * Description : add new test case to database
     *
     * @param  $data - test case details
     * @throws Exception If can not get the result
     */
    public function addTestCase($data) {

        try {
            $this->db->insert('testcase', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : addTestStep
     * Description : add new test step to database
     *
     * @param  $data - test step details
     * @throws Exception If can not get the result
     */
    public function addTestStep($data) {
        try {
            $this->db->insert('testcase_step', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_TestSuiteToAssign
     * Description : get test suite details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return test suite details
     */
    function get_TestSuiteToAssign($pid) {
        try {
            $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_TestCaseToAssign
     * Description : get reviewed test case details
     *
     * @param  $pid - project ID
     * @param  $tsid - test suite id
     * @throws Exception If can not get the result
     * @return test case details
     */
    function get_TestCaseToAssign($pid, $tsid) {
        try {
            $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Review Passed'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : updateTCAssign
     * Description : update status of test case
     *
     * @param  $data - updated test case details
     * @param  $tcID - test case ID
     * @throws Exception If can not get the result
     */
    function updateTCAssign($data, $tcID) {
        try {
            $this->db->where('testcase_id', $tcID);
            $this->db->update('testcase', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

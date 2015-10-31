<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Project_m
 * Description : this class represent the project table in db and it's functionality
 */

class Project_m extends My_Model {

    /**
     * @var string array
     * @access public
     */
    public $data = array();
    /**
     * @var string
     * @access protected
     */
    protected $_table_name = "project";
    /**
     * @var string
     * @access protected
     */
    protected $_order_by = "";
    /**
     * @var bool
     * @access protected
     */
    protected $_timestamps = FALSE;

    /**
     * @author : Roledene
     * Type : constructor
     * Name : __construct
     * Description : Default constructor for project_m class
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getAllProjects
     * @return string array project names
     * Description : this method return all the project tuples in project table
     */
    public function getAllProjects() {
        $project = $this->get();
        if (count($project)) {
            $data = null;
            $i = 0;
            while (count($project) > $i) {
                $data[$i] = array(
                    'pid' => $project[$i]->project_id,
                    'name' => $project[$i]->name,
                    'description' => $project[$i]->description,
                    'startingDate' => $project[$i]->starting_date,
                    'endingDate' => $project[$i]->ending_date,
                    'status' => $project[$i]->status,
                    'prorityId' => $project[$i]->prority_id
                );
                $i++;
            }
            return $data;
        } else { // if there wasn't any projects
            #TODO
            #print an error message
            return null;
        }
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getProjectsByUser
     * @param int $userId
     * @return string sql query as json
     * Description : this method return all the project that assigning to one user
     */
    public function getProjectsByUser($userId) {
        try {
            $this->db->select('p.project_id,p.name');
            $this->db->from('project_member AS pm');
            $this->db->from('project AS p');
            $this->db->where('pm.project_id=p.project_id AND pm.member_id = ' . $this->session->userdata('uid'));

            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
     /*
     * Auther : Ishara
     * Type : method
     * Name : get_columnchartdata
     * Description : this method return project time allocation
     */

    public function get_columnchartdata() {
        try {
            $this->db->select('Pname, totalhours, spentours');
            $this->db->from('charts');
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getAllProjectsID
     * Description : get project ID
     *
     * @throws Exception If can not get the result
     * @return project IDs
     */
    function getAllProjectsID() {
        try {

            $this->load->database();
            $sql = ('select * from project');
            $query = $this->db->query($sql);

            foreach ($query->result_array() as $row) {
                $data[$row['project_id']] = $row['name'];
            }
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
	
    /**
     * Name : getProjectName
     * Description : get project name
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return project name
     */
	public function getProjectName($pid) {
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

    /**
     * Name : getFailedTestcases
     * Description : get no of failed test cases
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return failed test count
     */
    public function getFailedTestcases($pid) {
        try {
            $queryTC = "SELECT COUNT(tc.testcase_id) as FailedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.psb_status = 'Execution Failed'";

            $result = $this->db->query($queryTC);
            $x = $result->result();
            return $x[0]->FailedTC;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getPassedTestcases
     * Description : get no of passed test cases
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return passed test count
     */
    public function getPassedTestcases($pid) {
        try {
            $queryTC = "SELECT COUNT(tc.testcase_id) as PassedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.psb_status = 'Execution Passed'";

            $result = $this->db->query($queryTC);
            $x = $result->result();
            return $x[0]->PassedTC;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getInProgressTestcases
     * Description : get no of in progress test cases
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return in progress test count
     */
    public function getInProgressTestcases($pid) {
        try {
            $queryTC = "SELECT COUNT(tc.testcase_id) as InProgressTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.psb_status = 'in progress'";

            $result = $this->db->query($queryTC);
            $x = $result->result();
            return $x[0]->InProgressTC;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    /**
     * Name : getFailedTestcasesDetails
     * Description : get failed test case details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return failed test case details
     */
    function getFailedTestcasesDetails($pid) {
        try {
            $queryFTC = "SELECT tc.testcase_id, tc.title, pr.priority_id as priority,pr.name as prname, ts.name as testSuite from testsuites ts, testcase tc, priority pr WHERE ts.testsuites_id=tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id='$pid' and tc.psb_status = 'Execution Failed' ORDER BY pr.priority_id, ts.testsuites_id";
            $result = $this->db->query($queryFTC);
            $x = $result->result();
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getPassedTestcasesDetails
     * Description : get passed test case details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return passed test case details
     */
    function getPassedTestcasesDetails($pid) {
        try {
            $queryFTC = "SELECT tc.testcase_id, tc.title, pr.priority_id as priority,pr.name as prname, ts.name as testSuite from testsuites ts, testcase tc, priority pr WHERE ts.testsuites_id=tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id='$pid' and tc.psb_status = 'Execution Passed' ORDER BY pr.priority_id, ts.testsuites_id";
            $result = $this->db->query($queryFTC);
            $x = $result->result();
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getInProTestcasesDetails
     * Description : get in progress test case details
     *
     * @param  $pid - project ID
     * @throws Exception If can not get the result
     * @return in progress test case details
     */
    function getInProTestcasesDetails($pid) {
        try {
            $queryFTC = "SELECT tc.testcase_id, tc.title, pr.priority_id as priority,pr.name as prname, ts.name as testSuite from testsuites ts, testcase tc, priority pr WHERE ts.testsuites_id=tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id='$pid' and tc.psb_status = 'in progress' ORDER BY pr.priority_id, ts.testsuites_id";
            $result = $this->db->query($queryFTC);
            $x = $result->result();
            return $result->result();
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
    public function get_projectDetails($pid) {
        try {
            $query = "SELECT p.project_id, p.name, p.status,p.starting_date,p.ending_date, p.prority_id FROM project p, priority pr WHERE p.prority_id = pr.priority_id AND p.project_id = '$pid'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
}


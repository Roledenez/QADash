<?php

/*
 * Auther : Roledene
 * Type : class
 * Name : Project_m
 * Description : this class represent the project table in db and it's functionality
 */

class Project_m extends My_Model {

    // table name of the database
    public $data = array();
    // order by clouse
    protected $_table_name = "project";
    protected $_order_by = "";
    // output data holder
    protected $_timestamps = FALSE;

    // constructor

    public function __construct() {
        parent::__construct();
    }

    /*
     * Auther : Roledene
     * Type : method
     * Name : getAllProjects
     * Description : this method return all the project tuples in project table
     */

    public function getAllProjects() {
        $project = $this->get();
        if (count($project)) {// if project found
            //var_dump($project);
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

    /*
     * Auther : Roledene
     * Type : method
     * Name : getProjectsByUser
     * Description : this method return all the project that assigning to one user
     */

    public function getProjectsByUser($userId)
    {

//        $arr = array(
//            'records' => array(
//                array(
//                'Name' => 'Kokilani',
//                'City' => 'Galle',
//                'Country' => 'Sri lanka'
//            ),
//                array(
//                    'Name' => 'Alfreds Futterkiste',
//                    'City' => 'Berlin',
//                    'Country' => 'Germany'
//                )
//            )
//        );
//        $this->db->select('*');
//        $this->db->from('project');
//        $this->db->where('name','Hot Bug Fix');
//        $query = $this->db->get('project');
        try {
            $this->db->select('name');
            $this->db->from('project');
////            $this->db->where('project_id', $pid);
//            $query = $this->db->get();
//            $x = $query->result();
            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
//        return json_encode($query);
    }

    /*
     * Auther : Roledene
     * Type : method
     * Name : getFinishedProjects
     * Description : this method return all the project tuples in project table
     */

    public function getFinishedProjects() {
        $project = $this->get();
        if (count($project)) {// if project found
            // var_dump($project);
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

    /*
     * Auther : Ishara
     * Type : method
     * Name : getAllProjectsID
     * Description : this method return all the project id
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

    /*
     * Auther : Ishara
     * Type : method
     * Name : getProjectsSprintDet
     * Description : this method return all the project sprint details
     */

    public function getProjectsSprintDet($pid) {
        try {

            $query = "SELECT * from project_sprint where project_id= $pid";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : getProjectName
     * Description : this method return project name for id
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

    /*
     * Auther : Ishara
     * Type : method
     * Name : getFailedTestcases
     * Description : this method return failed testcases
     */

    function getFailedTestcases($pid) {
        try {
            $queryTC = "SELECT COUNT(tc.testcase_id) as FailedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.psb_status = 'failed'";

            $result = $this->db->query($queryTC);
            $x = $result->result();
            return $x[0]->FailedTC;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : getPassedTestcases
     * Description : this method return passed testcases
     */

    function getPassedTestcases($pid) {
        try {
            $queryTC = "SELECT COUNT(tc.testcase_id) as PassedTC
                    from project p, testsuites ts, testcase tc
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and p.project_id=$pid and tc.psb_status = 'passed'";

            $result = $this->db->query($queryTC);
            $x = $result->result();
            return $x[0]->PassedTC;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : getInProgressTestcases
     * Description : this method return in progress testcases
     */

    function getInProgressTestcases($pid) {
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

    /*
     * Auther : Ishara
     * Type : method
     * Name : get_columnchartdata
     * Description : this method return project time allocation
     */

    function get_columnchartdata() {
        try {
            $this->db->select('Pname, totalhours, spentours');
            $this->db->from('charts');
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : getFailedTestcasesDetails
     * Description : this method return failed test cases details
     */

    function getFailedTestcasesDetails($pid) {
        try {
            $queryFTC = "SELECT p.name as pname, ts.name testsuiteName,tc.testcase_id as tid, tc.description as testcase, pr.priority_id as priority,pr.name as prname, ts.name as testSuit from project p, testsuites ts, testcase tc, priority pr
                    WHERE p.project_id=ts.project_id and ts.testsuites_id=tc.testsuites_id and tc.prority_id=pr.priority_id and p.project_id=$pid and tc.psb_status = 'failed' ORDER BY pr.priority_id, ts.testsuites_id ";

            $result = $this->db->query($queryFTC);
            $x = $result->result();
            //print_r('query = '.$x[0]->pname);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}


<?php

/*
 * Author : Roledene JKS
 * Type : class
 * Name : User_m
 * Description : This class represent the user model
 */

class User_m extends My_Model {

    public $rules = array(
        'email' => array('field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        'password' => array('field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );
    protected $_table_name = "users";
    // rules for the login imput fields
    protected $_order_by = "";
//    protected $_primary_key = "users_id";
    protected $_timestamps = FALSE;

    /*
     * Author : Roledene JKS
     * Type : constructor
     * Name : __construct
     * Description : Default construtor for User_m class
     */

    public function __construct() {
        parent::__construct();
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : login
     * Description : This method validate the username and password with databse values and create the session
     */

    public function login() {
        // get the user with given email and password
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
                ), TRUE);
        //if user found do the following, otherwise do nothing
        if (count($user)) {
            //log in user
            $data = array(
                'uid' => $user->users_id,
                'fname' => $user->firstName,
                'lname' => $user->lastName,
                'username' => $user->uername,
                'email' => $user->email,
                'id' => $user->users_id,
                'role' => $user->role,
                'password' => $user->password,
                'loggedin' => TRUE
            );
            // create the login session with above details
            $this->session->set_userdata($data);
        }
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : logout
     * Description : Destroy the login session
     */

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : loggedin
     * Description : This function return TRUE, if loggin session already created, otherwise return false
     */

    public function logout()
    {
        $this->session->sess_destroy();
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : hash
     * Param1 : a string value which needs to hash
     * Description : This function concatinate given string with configuration key and hash using SHA512 algorithm
     */

    public function loggedin()
    {
        return (bool)$this->session->userdata('loggedin');
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : addUser
     * Param1 : db table name
     * Param2 : primary key of the table
     * Description : This method add a new user to the system
     */

    public function addUser($tableName, $primaryKey) {

        $this->user_m->_table_name = $tableName;
        $this->user_m->_primary_key = $primaryKey;

        $id = $this->save(array(
            'firstName' => $this->input->post('fname'),
            'lastName' => $this->input->post('lname'),
            'uername' => $this->input->post('username'),
            'role' => $this->input->post('role'),
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
        ));
        return $id;
    }

    /*
     * Author : Roledene JKS
     * Type : method
     * Name : addUser
     * Description : This method add a new user to the system
     */

    public function update($tableName, $primaryKey) {

        $this->user_m->_table_name = $tableName;
        $this->user_m->_primary_key = $primaryKey;

        if ($this->input->post('id') !== null) {
            $user = $this->get_by(array(
                'users_id' => $this->input->post('id'),
                    ), TRUE);
        }

        $id = $this->save(array(
            'firstName' => $this->input->post('fname') !== null ? $this->input->post('fname') : $user->firstName,
            'lastName' => $this->input->post('lname') !== null ? $this->input->post('lname') : $user->lastName,
            'uername' => $this->input->post('username') !== null ? $this->input->post('username') : $user->uername,
            // 'role' => $this->session->userdata('role') !== null ? $this->session->userdata('role') : $user->role,//"admin";//$this->input->post('role'),
            'role' => $this->input->post('role') !== null ? $this->input->post('role') : $user->role, //"admin";//$this->input->post('role'),
            'email' => $this->input->post('email') !== null ? $this->input->post('email') : $user->email,
            'password' => $this->input->post('password') !== null ? $this->hash($this->input->post('password')) : $user->password
                ), $this->input->post('id') !== null ? $this->input->post('id') : $this->session->userdata('uid'));
        return $id;
    }

    /*
     * Author : Ishara
     * Type : method
     * Name : get_userProjectDet
     * Description : this method return project assigned for user
     */

    function get_userProjectDet($uid) {
        try {
            $query = "select p.*, pr.name as priority from project p, project_member pm, priority pr WHERE p.project_id=pm.project_id and p.prority_id=pr.priority_id and  pm.member_id=$uid";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Author : Ishara
     * Type : method
     * Name : getAllProjectsID
     * Description : this method return project id
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
     * Author : Ishara
     * Type : method
     * Name : getAssignedIssues
     * Description : this method return assigned issues for user
     */

//    function getAssignedIssues($pid, $uid) {
//        try {
//            $query = "SELECT i.issue_id,i.description,p.name,p.priority_id FROM issue i, priority p WHERE i.prioriry_id=p.priority_id AND project_id=$pid AND member_id=$uid";
//            $result = $this->db->query($query);
//            return $result->result();
//        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
//        }
//    }

    function getAssignedToReviewed($pid, $uid) {
        try {
            $query = "SELECT * FROM testsuites WHERE assignedToReview = $uid AND project_id ='$pid' ";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /*
     * Author : Ishara
     * Type : method
     * Name : getAssignedTestCases
     * Description : this method return assigned test cases for user
     */

    function getAssignedTestCases($pid, $uid) {
        try {

            $query = "SELECT tc.testcase_id,tc.description, tc.title, ts.name ,pr.name as priority , pr.priority_id FROM testsuites ts, testcase tc, priority pr WHERE ts.testsuites_id=tc.testsuites_id AND tc.prority_id=pr.priority_id AND ts.project_id='$pid' AND tc.member_id=$uid and tc.psb_status='Assign To Excecution' ORDER BY pr.priority_id";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*
     * Author : Ishara
     * Type : method
     * Name : get_projectTime
     * Description : this method return allocation time
     */

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

    /*
     * Author : Ishara
     * Type : method
     * Name : get_projectAllocTime
     * Description : this method return project allocation time for purticular user
     */

    function get_projectAllocTime($mid) {
//                        $this->db->select('name,description,status,prority_id, progress,totalhours, spentours');
//                        $this->db->from('project');
//                        $query = $this->db->get();
//
//                        return $query->result();
        try {

            $query = "SELECT p.name, t.assigned_hours, t.spent_hours FROM project p, time_entries t WHERE p.project_id=t.project_id and t.member_id=$mid";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    
    function get_projectDetails($pid) {
        $query = "SELECT p.project_id, p.name, p.status, p.prority_id, p.starting_date, p.ending_date, pr.name as pname FROM project p, priority pr WHERE p.prority_id = pr.priority_id and p.project_id ='$pid'";
        $result = $this->db->query($query);
        return $result->result();
    }
    function get_TestCaseDetails($pid, $tsid){
        $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Assigned To Review'";
        $result = $this->db->query($query);
        return $result->result();
    }
    function get_TestSuiteDetails($pid, $uid){
        $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid' and t.assignedToReview = $uid and reviewed IS NULL ";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    function updateTCStatus($data,$tcID){
        $this->db->where('testcase_id', $tcID);
        $this->db->update('testcase', $data); 
    }
    function get_TestStepDetails($tcID){
        $query = "SELECT testcaseStep_id,testcase_id, description, expectedResult FROM testcase_step WHERE testcase_id = $tcID ";
        $result = $this->db->query($query);
        return $result->result();
    }
    
    function get_AssignToReviewCOunt($pid, $tsid){
        $query = "SELECT COUNT(tc.testcase_id) as count FROM testcase tc ,testsuites ts WHERE ts.testsuites_id = tc.testsuites_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Assigned To Review'";
        $result = $this->db->query($query);
        $x = $result->result();
        return $x[0]->count;
    }
    
    function updateRevewStatus($data,$tsID){
        $this->db->where('testsuites_id', $tsID);
        $this->db->update('testsuites', $data); 
    }

}


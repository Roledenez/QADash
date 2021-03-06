<?php

/**
 * @author : Roledene
 * Type : class
 * Name : User_m
 * Description : This class represent the user model
 */
class User_m extends My_Model {
    /**
     * @var string 2d array
     * @access public
     */
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
    /**
     * @var string
     * @access protected
     */
    protected $_table_name = "users";
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
     * Description : Default construtor for User_m class
     */

    public function __construct() {
        parent::__construct();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : login
     * Description : This method validate the username and password with database values and create the session
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

            $nSubject = new Notification_m();
            $nSubject->insertNotification($user->users_id, 0, "Logged in", "You have been logged in to the QADashboard", "loggin", site_url() . "engineer/users/showProfile");

        }
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : hash
     * @param string $string
     * @return string sha512 hash value of the parameter
     * Description : This method hash the given string using sha512 algorithm
     */

    public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getUser
     * @param string $email
     * @param string $password
     * @return User user object
     * Description : this method return the user object which match the username and password
     */
    public function getUser($email, $password)
    {
        // get the user with given email and password
        $user = $this->get_by(array(
            'email' => $email,
            'password' => $password
        ), TRUE);
        return $user;
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : logout
     * Description : this method dietary the login session
     */

    public function logout() {
        $this->session->sess_destroy();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : loggedin
     * @return User login user
     * Description : This function return the logged in user
     */

    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : addUser
     * @param string $tableName
     * @param string $primaryKey
     * @return int user id
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

    /**
     * @author : Roledene
     * Type : method
     * Name : update
     * @param string $tableName
     * @param string $primaryKey
     * @return int user id
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
        try {

            $query = "SELECT p.name, t.assigned_hours, t.spent_hours FROM project p, time_entries t WHERE p.project_id=t.project_id and t.member_id=$mid";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getAssignedToReviewed
     * Description : get assign to review Test suite details
     *
     * @param  $pid - project ID
     * @param  $uid - user id
     * @throws Exception If can not get the result
     * @return test suite details
     */
    function getAssignedToReviewed($pid, $uid) {
        try {
            $query = "SELECT * FROM testsuites WHERE assignedToReview = $uid AND project_id ='$pid' ";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getAssignedTestCases
     * Description : get assign to execute Test case details
     *
     * @param  $pid - project ID
     * @param  $uid - user id
     * @throws Exception If can not get the result
     * @return test case details
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
     * @param  $tsid - test suite ID
     * @throws Exception If can not get the result
     * @return get_TestCase details
     */
    function get_TestCaseDetails($pid, $tsid) {
        try {
            $query = "SELECT tc.testcase_id, tc.testcase_code, ts.testsuites_code, tc.title, tc.description, pr.name as pname, tc.prority_id FROM testcase tc , testsuites ts , priority pr WHERE ts.testsuites_id = tc.testsuites_id and tc.prority_id=pr.priority_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Assigned To Review'";
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
     * @param  $uid - user id
     * @throws Exception If can not get the result
     * @return test suite details
     */
    function get_TestSuiteDetails($pid, $uid) {
        try {
            $query = "SELECT t.testsuites_id ,t.testsuites_code, t.name,t.Priority, pr.name as pname FROM `testsuites` t, priority pr WHERE t.Priority = pr.priority_id and t.project_id ='$pid' and t.assignedToReview = $uid and reviewed IS NULL ";
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
     * Name : get_AssignToReviewCOunt
     * Description : get reviewed test case details
     *
     * @param  $pid - project ID
     * @param  $tsid - test case id
     * @throws Exception If can not get the result
     * @return reviewed test case details
     */
    function get_AssignToReviewCOunt($pid, $tsid) {
        try {
            $query = "SELECT COUNT(tc.testcase_id) as count FROM testcase tc ,testsuites ts WHERE ts.testsuites_id = tc.testsuites_id and ts.project_id ='$pid' and ts.testsuites_id=$tsid and tc.psb_status = 'Assigned To Review'";
            $result = $this->db->query($query);
            $x = $result->result();
            return $x[0]->count;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : updateRevewStatus
     * Description : update status of test case to review
     *
     * @param  $data - updated test case details
     * @param  $tcID - test case ID
     * @throws Exception If can not get the result
     */
    function updateRevewStatus($data, $tsID) {
        try {
            $this->db->where('testsuites_id', $tsID);
            $this->db->update('testsuites', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : updateTCStatus
     * Description : update status of test case
     *
     * @param  $data - updated test case details
     * @param  $tcID - test case ID
     * @throws Exception If can not get the result
     */
    function updateTCStatus($data, $tcID) {
        try {
            $this->db->where('testcase_id', $tcID);
            $this->db->update('testcase', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}


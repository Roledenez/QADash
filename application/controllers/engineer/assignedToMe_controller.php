<?php

/**
 * Description of assignedToMe_controller
 *
 * @author Ishara1
 */
class AssignedToMe_controller extends Engineer_Controller {

    public function __constructor() {
        parent::__constructor();
        $this->load->model('user_m');
    }

    public function index() {
        $pid = $this->session->userdata('project_id');
        $this->data['pid'] = $pid;
        $this->data['testCase'] = null;
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['reviewTS'] = $this->user_m->getAssignedToReviewed($pid, $uid);
        $this->data['assignedTC'] = $this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['projects'] = $this->user_m->get_projectDetails($pid);
        $this->data['testSuite'] = $this->user_m->get_TestSuiteDetails($pid, $uid);

        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /**
     * Name : LoadTestCase
     * Description : Load assigned test cases for logged in member
     *
     * @param  $pid - project ID
     * @param  $tsID - Test suite ID
     */
    public function LoadTestCase($pid, $tsID) {

        $this->data['pid'] = $pid;
        $this->data['tsid'] = $tsID;
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['reviewTS'] = $this->user_m->getAssignedToReviewed($pid, $uid);
        $this->data['assignedTC'] = $this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['projects'] = $this->user_m->get_projectDetails($pid);
        $this->data['testSuite'] = $this->user_m->get_TestSuiteDetails($pid, $uid);

        $this->data['testCase'] = $this->user_m->get_TestCaseDetails($pid, $tsID);

        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /**
     * Name : UpdateStatus
     * Description : Update the status of assignd test case to review
     *
     * @param  $pid - project ID
     * @param  $ts_id - Test suite ID
     * @param  $tcID - Test case ID
     * @throws Some_Exception_Class If can not assign test 
      cases
     */
    public function UpdateStatus($pid, $tcID, $ts_id) {
        try {
            $data = array(
                'psb_status' => $this->input->post('review'),
            );
            $this->user_m->updateTCStatus($data, $tcID);
            $this->data['count'] = $this->user_m->get_AssignToReviewCOunt($pid, $ts_id);
            if (($this->data['count']) == 0) {
                $dataReview = array(
                    'reviewed' => 1,
                );
                $this->user_m->updateRevewStatus($dataReview, $ts_id);
            }
            redirect("engineer/assignedToMe_controller/LoadTestCase/$pid/$ts_id");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : LoadAssignedTestCase
     * Description : load test cases for selected project
     *
     * @param  $pid - project ID
     */
    public function LoadAssignedTestCase($pid) {
        $this->data['testStep'] = null;
        $this->data['pid'] = $pid;
        $uid = $this->session->userdata('uid');
        $this->data['testCase'] = $this->user_m->getAssignedTestCases($pid, $uid);

        $this->data['subview'] = 'engineer/user/assignedToExecution';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /**
     * Name : LoadTestStep
     * Description : load test steps for selected test case
     *
     * @param  $pid - project ID
     * @param  $tcid - Test case ID
     */
    public function LoadTestStep($pid, $tcid) {
        $this->data['pid'] = $pid;
        $uid = $this->session->userdata('uid');

        $this->data['testCase'] = $this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['testStep'] = $this->user_m->get_TestStepDetails($tcid);
        $this->data['subview'] = 'engineer/user/assignedToExecution';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /**
     * Name : UpdateExecutionStatus
     * Description : Update the status of assignd test case to execute
     *
     * @param  $pid - project ID
     * @param  $tcID - Test case ID
     * @throws Some_Exception_Class If can not assign test 
      cases
     */
    public function UpdateExecutionStatus($pid, $tcID) {
        $data = array(
            'psb_status' => $this->input->post('execute'),
            'open' => 0,
        );
        $this->user_m->updateTCStatus($data, $tcID);
        redirect("engineer/assignedToMe_controller/LoadAssignedTestCase/$pid");
    }

}

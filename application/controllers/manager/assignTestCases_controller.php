<?php

class AssignTestCases_controller extends Manager_Controller {

    public function __constructor() {
        parent::__constructor();
        $this->load->model('project_model');
    }

    public function index() {
        $this->load->model('project_model');
        $pid = $this->session->userdata('project_id');
        $this->data['pid'] = $pid;
        $this->data['testSuite'] = $this->project_model->get_TestSuiteToAssign($pid);
        $this->data['subview'] = 'manager/user/assignTestCases_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /**
     * Name : LoadTestCase
     * Description : load reviewed test cases for selected test suite
     *
     * @param  $pid - project ID
     * @param  $tsID - Test suite ID
     * @throws Some_Exception_Class If can not load the reviewed testcases
     */
    public function LoadTestCase($pid, $tsID) {
        try {
            $this->load->model('project_model');
            $this->data['pid'] = $pid;
            $this->data['tsid'] = $tsID;
            $this->data['testSuite'] = $this->project_model->get_TestSuiteToAssign($pid);
            $this->data['testCase'] = $this->project_model->get_TestCaseToAssign($pid, $tsID);
            $this->data['users'] = $this->project_model->getUserList($pid);

            $this->data['subview'] = 'manager/user/assignTestCases_view';
            $this->load->view("manager/_layout_main", $this->data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : AssignTestCase
     * Description : assign test cases for members
     *
     * @param  $pid - project ID
     * @param  $ts_id - Test suite ID
     * @param  $tcID - Test case ID
     * @throws Some_Exception_Class If can not assign test cases
     */
    public function AssignTestCase($pid, $tcID, $ts_id) {
        $this->load->model('project_model');
        $nSubject = new Notification_m();
        $nSubject->insertNotification($this->input->post('user'), $pid, "Assign Test Case To Execute", "You have assigned for new test case to execute", "Assigned", site_url() . "engineer/assignedToMe_controller/LoadAssignedTestCase/$pid");
        $nSubject->insertNotification($this->session->userdata('uid'), $pid, "Assign Test Case To Execute", "You have assign a new test case to execute", "Assigned", site_url() . "manager/assignTestCases_controller");
        $data = array(
            'member_id' => $this->input->post('user'),
            'psb_status' => 'Assign To Excecution',
        );
        $this->project_model->updateTCAssign($data, $tcID);
        redirect("manager/assignTestCases_controller/LoadTestCase/$pid/$ts_id");
    }

}
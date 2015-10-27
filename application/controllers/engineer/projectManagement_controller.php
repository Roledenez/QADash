<?php

class projectManagement_controller extends Engineer_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function index() {
        $this->load->model('project_model');
        $this->data['load_tc'] = -1;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['subview'] = 'engineer/user/projectManagement_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    public function createTestSuit($pid) {
        $this->data['ppid'] = $pid;
        $this->data['load_ts'] = null;
        $this->data['load_tc'] = null;
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['subview'] = 'engineer/user/testSuit_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    public function LoadcreateTestSuit($pid) {
        $this->data['ppid'] = $pid;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['users'] = $this->project_model->getUserList($pid);
        $this->data['load_ts'] = 1;
        $this->data['load_tc'] = -1;
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['subview'] = 'engineer/user/testSuit_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
     public function AddnewTestSuite($pid) {
        $this->load->model('project_model');
        $this->data['load_ts'] = 1;
        $this->data['load_tc'] = -1;
        
        $this->data['ppid'] = $pid;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['users'] = $this->project_model->getUserList($pid);
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('ts_code', 'Test Suite Code ', 'required');
        $this->form_validation->set_rules('title', 'Test Suite Title ', 'required');
        $this->form_validation->set_rules('priority', 'Priority ', 'required');
        $this->form_validation->set_rules('users', 'Assigned To Review ', 'required');
        
        if ($this->form_validation->run()) {
            $ts_id = $this->input->post('ts_code');
            $data = array(
                'testsuites_code' => $this->input->post('ts_code'),
                'project_id' => $pid,
                'name' => $this->input->post('title'),
                'Priority' => $this->input->post('priority'),
                'assignedToReview' => $this->input->post('users'),
            );
            $this->project_model->addTestSuite($data);
            redirect("engineer/projectManagement_controller/createTestCase/$pid/$ts_id");
        }

        $this->load->model('project_model');
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['subview'] = 'engineer/user/testSuit_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    public function createTestCase($pid,$testSuiteID) {
        //project id
        $this->data['ppid'] = $pid;
        $this->data['load_ts'] = null;
        $this->data['load_tc'] = 1;
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['subview'] = 'engineer/user/testSuit_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
     public function LoadcreateTestCase($pid,$testSuiteID) {
        $this->data['loadTeSt']=null;
        $this->data['viewTeSt']=null;
        $this->data['ppid'] = $pid;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['subview'] = 'engineer/user/testCase_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    public function AddnewTestCase($pid,$ts_id,$testSuiteID) {
        $this->load->model('project_model');
        
         $this->data['loadTeSt']=null;
        $this->data['viewTeSt']=null;
        $this->data['ppid'] = $pid;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('tc_code', 'Test Case Code ', 'required');
        $this->form_validation->set_rules('title', 'Test Case Title ', 'required');
        $this->form_validation->set_rules('description', 'Description ', 'required');
        $this->form_validation->set_rules('priority', 'Priority ', 'required');
        
        if ($this->form_validation->run()){
             $tc_code = $this->input->post('tc_code');
            $data = array(
                'testcase_code' => $this->input->post('tc_code'),
                'testsuites_id' => $ts_id,
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'prority_id' => $this->input->post('priority'),
                'psb_status' => 'Assigned To Review',
                'open' => 1,
            );
            
            $this->project_model->addTestCase($data);
            redirect("engineer/projectManagement_controller/createTestSteps/$pid/$tc_code/$testSuiteID");;
        }

        $this->data['subview'] = 'engineer/user/testCase_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    public function createTestSteps($pid,$tcID,$testSuiteID) {
        $this->data['loadTeSt']=1;
        $this->data['viewTeSt']=null;
        $this->data['ppid'] = $pid;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['testCase'] = $this->project_model->get_TestCaseDetails($pid);
        $this->data['subview'] = 'engineer/user/testCase_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    public function LoadcreateTestStep($pid,$tcID,$testSuiteID) {
        $this->data['loadTeSt']=1;
        $this->data['viewTeSt']=1;
        $this->data['ppid'] = $pid;
        $this->data['tsID'] = $testSuiteID;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['testCase'] = $this->project_model->get_TestCaseDetails($pid);
        $this->data['subview'] = 'engineer/user/testCase_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
   
    public function AddnewTestStep($pid,$testSuiteID,$tc_id) {
        $this->load->model('project_model');
        
        $this->data['loadTeSt']=1;
        $this->data['viewTeSt']=1;
        $this->data['ppid'] = $pid;
        $this->data['tsID'] = $testSuiteID;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['testCase'] = $this->project_model->get_TestCaseDetails($pid);
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $this->form_validation->set_rules('description', 'Description ', 'required');
        $this->form_validation->set_rules('exresult', 'Expected Result ', 'required');
        
        if ($this->form_validation->run()) {
             $tc_code = $this->input->post('tc_code');
            $data = array(
                'testcase_id' =>$tc_id ,
                'description' => $this->input->post('description'),
                'expectedResult' => $this->input->post('exresult'),
            );
            
            $this->project_model->addTestStep($data);
            redirect("engineer/projectManagement_controller/ShowTestSteps/$pid/$tc_id/$testSuiteID");
        }

        $this->data['subview'] = 'engineer/user/testCase_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
     public function ShowTestSteps($pid,$tcID,$testSuiteID) {
        $this->data['loadTeSt']=1;
        $this->data['viewTeSt']=null;
        $this->data['ppid'] = $pid;
        $this->data['tsID'] = $testSuiteID;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['testSuite'] = $this->project_model->get_TestSuiteDetails($pid);
        $this->data['testCase'] = $this->project_model->get_TestCaseDetails($pid);
        $this->data['testStep'] = $this->project_model->get_TestStepDetails($tcID);
        $this->data['subview'] = 'engineer/user/testStep_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
}

<?php

class AssignTestCases_controller extends Manager_Controller {
    
  public function __constructor() {
        parent::__constructor();
        $this->load->model('project_model');
    }
    
    public function index() {
        $this->load->model('project_model');
        $pid =$this->session->userdata('project_id') ;   
        $this->data['pid'] = $pid;
        $this->data['testSuite'] = $this->project_model->get_TestSuiteToAssign($pid);
        $this->data['subview'] = 'manager/user/assignTestCases_view';
        $this->load->view("manager/_layout_main", $this->data); 
    }
    
    public function LoadTestCase($pid, $tsID) {
        $this->load->model('project_model');
        $this->data['pid'] = $pid;
        $this->data['tsid']=$tsID;
        $this->data['testSuite'] = $this->project_model->get_TestSuiteToAssign($pid);
        $this->data['testCase'] = $this->project_model->get_TestCaseToAssign ($pid, $tsID);
        $this->data['users'] = $this->project_model->getUserList($pid);
        
        $this->data['subview'] = 'manager/user/assignTestCases_view';
        $this->load->view("manager/_layout_main", $this->data);
    }
    
    public function AssignTestCase($pid,$tcID,$ts_id) {
        $this->load->model('project_model');
        $data = array(
                'member_id' => $this->input->post('user'),
                'psb_status' => 'Assign To Excecution',
            );
        $this->project_model->updateTCAssign($data,$tcID);
        redirect("manager/assignTestCases_controller/LoadTestCase/$pid/$ts_id");
    }
}
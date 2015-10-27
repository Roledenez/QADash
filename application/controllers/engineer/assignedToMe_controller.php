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
    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */

    public function index() {
        $pid =$this->session->userdata('project_id');
      // print_r($pid); exit();
        $this->data['pid'] = $pid;
        $this->data['testCase'] = null; 
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['reviewTS']= $this->user_m->getAssignedToReviewed($pid, $uid);
        $this->data['assignedTC']=$this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['projects'] = $this->user_m->get_projectDetails($pid);
        $this->data['testSuite'] = $this->user_m->get_TestSuiteDetails($pid,$uid);
        
        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
        
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : AssignedJobsLoad
     */
    public function LoadTestCase($pid, $tsID) {
        
        $this->data['pid'] = $pid;
        $this->data['tsid']=$tsID;     
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['reviewTS']= $this->user_m->getAssignedToReviewed($pid, $uid);
        $this->data['assignedTC']=$this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['projects'] = $this->user_m->get_projectDetails($pid);
        $this->data['testSuite'] = $this->user_m->get_TestSuiteDetails($pid,$uid);
        
        $this->data['testCase'] = $this->user_m->get_TestCaseDetails($pid, $tsID);
        
        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : drawChart
     */
    
    public function UpdateStatus($pid,$tcID,$ts_id) {
        $data = array(
                'psb_status' => $this->input->post('review'),
            );
        $this->user_m->updateTCStatus($data,$tcID);
        $this->data['count'] = $this->user_m->get_AssignToReviewCOunt($pid, $ts_id);
        if(($this->data['count'])==0)
        {
            $dataReview = array(
                'reviewed' => 1,
            );
            $this->user_m->updateRevewStatus($dataReview,$ts_id);
        }
        redirect("engineer/assignedToMe_controller/LoadTestCase/$pid/$ts_id");
    }
    
    public function LoadAssignedTestCase($pid) {
        $this->data['testStep']=null;
        $this->data['pid'] = $pid;
        $uid = $this->session->userdata('uid');
        $this->data['testCase'] = $this->user_m->getAssignedTestCases($pid, $uid);
        
       $this->data['subview'] = 'engineer/user/assignedToExecution';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    public function LoadTestStep($pid,$tcid) {
        $this->data['pid'] = $pid;
        $uid = $this->session->userdata('uid');
        
        $this->data['testCase'] = $this->user_m->getAssignedTestCases($pid, $uid);
        $this->data['testStep'] = $this->user_m->get_TestStepDetails($tcid);
       $this->data['subview'] = 'engineer/user/assignedToExecution';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    public function UpdateExecutionStatus($pid,$tcID) {
        $data = array(
                'psb_status' => $this->input->post('execute'),
                'open' => 0,
            );
        $this->user_m->updateTCStatus($data,$tcID);
        redirect("engineer/assignedToMe_controller/LoadAssignedTestCase/$pid");
    }
}

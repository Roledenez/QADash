<?php

class TestcaseChart_controller extends Engineer_Controller {
    

   public function __construct() {
        parent::__construct();
        $this->load->model('project_m');
    }
    
    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */
    public function index() {
        $this->data['names'] = $this->session->userdata('project_id') ;
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['subview'] = 'engineer/user/testcaseChart_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : drawChart
     */
    public function drawChart() {
        $pid = $this->session->userdata('project_id') ;
        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Failed Test Cases';
        
        $series2 = array();
        $series2['name'] = 'Passed Test Cases ';
        
        $series3 = array();
        $series3['name'] = 'In Progress testCases ';

        $category['data'][] = $this->project_m->getProjectName($pid);
        $series1['data'][] = $this->project_m->getFailedTestcases($pid);
        $series2['data'][] = $this->project_m->getPassedTestcases($pid);
       // $series3['data'][] = $this->project_m->getInProgressTestcases($pid);
         
        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        //array_push($result, $series3);
         
        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : showFailedTetCases
     */
    public function showTetCasesDetails($pid){
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['project'] = $pid;
        $this->data['FTestCases'] = $this->project_m->getFailedTestcasesDetails($pid);
        $this->data['PTestCases'] = $this->project_m->getPassedTestcasesDetails($pid);
        $this->data['InPTestCases'] = $this->project_m->getInProTestcasesDetails($pid);
         $this->data['subview'] = 'engineer/user/failedTestCase_view';
         $this->load->view("engineer/_layout_main", $this->data);
    }
}


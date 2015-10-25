<?php

class TestcaseChart_controller extends Admin_Controller {
    

   public function __construct() {
        parent::__construct();
        $this->load->model('project_m');
    }
    
    public function index() {
        $this->data['names'] = $this->input->post('projects');
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['subview'] = 'admin/user/testcaseChart_view';
        $this->load->view("admin/_layout_main", $this->data);
    }
    
    public function drawChart($pid) {
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
        $series3['data'][] = $this->project_m->getInProgressTestcases($pid);
         
        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
        array_push($result, $series3);
         
        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }
    
    public function showFailedTetCases($pid){
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['project'] = $pid;
        $this->data['FTestCases'] = $this->project_m->getFailedTestcasesDetails($pid);
         $this->data['subview'] = 'admin/user/failedTestCase_view';
         $this->load->view("admin/_layout_main", $this->data);
    }
}


<?php

class ProjectProgress_controller extends Manager_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */

    public function index() {
        $pid = $this->session->userdata('project_id') ;
        $this->data['done'] = $this->chart_model->getFinishedCount($pid);
        $this->data['notDone'] = $this->chart_model->getNotFinishedCount($pid);
        $this->data['projects'] = $this->chart_model->get_projectDetails($pid);
        $this->data['subview'] = 'manager/user/projectProgress_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : drawChart
     */

//    public function drawChart() {
//
//        $data = $this->chart_model->get_projectTime();
//
//        $category = array();
//        $category['name'] = 'Category';
//
//        $series1 = array();
//        $series1['name'] = 'Allocated Hours';
//
//        $series2 = array();
//        $series2['name'] = 'Spent Hours';
//
//
//        foreach ($data as $row) {
//            $category['data'][] = $row->name;
//            $series1['data'][] = $row->totalhours;
//            $series2['data'][] = $row->spentours;
//        }
//
//        $result = array();
//        array_push($result, $category);
//        array_push($result, $series1);
//        array_push($result, $series2);
//
//
//
//        print json_encode($result, JSON_NUMERIC_CHECK);
//
//        return $result;
//    }
    
   public function drawProgressChart() {
        $pid =$this->session->userdata('project_id') ;
        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Open Test Cases';
        
        $series2 = array();
        $series2['name'] = 'Closed Test Cases ';

        $category['data'][] = $this->chart_model->getProjectName($pid);
        $series1['data'][] = $this->chart_model->getNotFinishedCount($pid);
        $series2['data'][] = $this->chart_model->getFinishedCount($pid);
         
        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
         
        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }

}

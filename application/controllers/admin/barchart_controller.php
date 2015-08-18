<?php
class Barchart_controller extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
        $this->load->helper('url');
    }

    public function index() {
        $this->data['subview'] = 'admin/user/barchart_view';
	$this->load->view("admin/_layout_main",$this->data);
    }

    public function drawChart() {

        $data = $this->chart_model->get_barchartdata();

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'No of Issues';
        
        $series2 = array();
        $series2['name'] = 'No of Testcases';


        foreach ($data as $row) {
            $category['data'][] = $row->Pname;
            $series1['data'][] = $row->issues;
            $series2['data'][] = $row->testcases;
         
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
         
    

        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }

}

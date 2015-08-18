<?php

class Columnchart_controller extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
        $this->load->helper('url');
    }

    public function index() {
       $this->data['subview'] = 'admin/user/columnchart_view';
	$this->load->view("admin/_layout_main",$this->data);
    }

    public function drawChart() {

        $data = $this->chart_model->get_columnchartdata();

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Total No of allocated hours';
        
        $series2 = array();
        $series2['name'] = 'Total no of spent hours';


        foreach ($data as $row) {
            $category['data'][] = $row->Pname;
            $series1['data'][] = $row->totalhours;
            $series2['data'][] = $row->spentours;
         
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
         
    

        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }
}

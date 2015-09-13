<?php

class Linechart_controller extends Engineer_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('chart_model');
        $this->load->helper('url');
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */
    public function index() {

        $this->data['subview'] = 'engineer/user/linechart_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : drawChart
     */

    public function drawChart() {

        $data = $this->chart_model->get_data();

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'No of Failed Testcases';

        $series2 = array();
        $series2['name'] = 'No of Passed Testcases';


        foreach ($data as $row) {
            $category['data'][] = $row->pname;
            $series1['data'][] = $row->failedTC;
            $series2['data'][] = $row->passedTC;
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);



        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }

}

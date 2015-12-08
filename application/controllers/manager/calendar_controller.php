<?php

class Calendar_controller extends Manager_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    /**
     * Name : showcal
     * Description : This function pass the correct year and month the user requested and 
     * load and show the calendar
     * @param $year - requested year
     * @param $month - requested month
     */
    function showcal($year = null, $month = null) {
        if (!$year) {
            $year = date('y');
        }

        if (!$month) {
            $month = date('m');
        }

        $this->load->model('Calendar_model');

        if ($day = $this->input->POST('day')) {
            $this->Calendar_model->add_more_calendar_data(
                    "$year-$month-$day", $this->input->post('event')
            );
        }

        $this->data['calendar'] = $this->Calendar_model->generate($year, $month);
        $this->data['subview'] = ('manager/user/calendar_view');
        $this->load->view("manager/_layout_main", $this->data);
    }

}

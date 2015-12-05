<?php
/*
 * Author : Lakini
 * Type : class
 * Name : Calendar_controller 
 * Description : This class helps to combine the view with the model class.
 * It controls the activities in the database.
 */   
class Calendar_controller extends Admin_Controller{

public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    /*
 * Author : Lakini
 * Type : method
 * Name : showcal
 * Parameters:$year,$month
 * Description : This class pass the correct year and month the user requested and 
 * load and show the calendar
 */    
function showcal($year = null , $month = null)
{
    if (!$year)
    {
        $year = date('y');
    }

    if(!$month)
    {
        $month = date('m');
    }

    $this->load->model('Calendar_model');

    if ($day = $this->input->POST('day'))
    {
        $this->Calendar_model->add_more_calendar_data(
        "$year-$month-$day",
        $this->input->post('event')
         );
    }

    $this->data['calendar'] = $this->Calendar_model->generate($year, $month);
    $this->data['subview'] = ('admin/user/calendar_view');
    $this->load->view("admin/_layout_main",$this->data);

    }
}

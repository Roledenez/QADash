<?php

/*
 * Author : Lakini
 * Type : class
 * Name : Calendar_model
 * Description : This class handles the insert,update of the task which will 
 * going to dispaly in the Calander.
 */
class Calendar_model extends My_Model{

var $pref;

function __construct() {
    // Call the Model constructor
    parent::__construct();
    $this->pref = array(
        'show_next_prev'=> TRUE,
        'next_prev_url' => base_url().'admin/calendar_controller/showcal'
         );

/*
 * Using codeIgniter calander function 
 */
    $this->pref['template']='
        {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
            <div class="day_num">{day}</div>
            <div class="content">{content}</div>
        {cal_cell_content_today}
            <div class="day_num highlight">{day}</div>
            <div class="content">{content}</div>
        {/cal_cell_content_today}

        {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
        {cal_cell_no_content_today}
            <div class="day_num highlight">{day}</div>
        {/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
        ';
    }

/*
 * Author : Lakini
 * Type : method
 * Name : get_calendar_data
 * Parameters:$year,$month
 * Description : This method gets value for the calander from the database 
 * according to the parameters passed. 
 */    
function get_calendar_data($year,$month)
    {
        $this->db->select('date,event');
        $this->db->from('calendar');
        $this->db->like('date', "$year-$month", 'after');
        $query=$this->db->get();

        $cal_data = array();

         foreach ($query->result() as $row)
         {
             $cal_data[(int)substr($row->date,8,2)] = $row->event;
         }
         
         var_dump( $cal_data );
         return $cal_data;
    }

/*
 * Author : Lakini
 * Type : method
 * Name : get_datafromOtherTables
 * Parameters:$year,$month
 * Description : This method gets value for the calander from other tables of the database 
 * according to the parameters passed. 
 */        
function get_datafromOtherTables($year,$month)
    {
        $this->db->select('date,event');
        $this->db->from('project');
        $this->db->like('starting_date', "$year-$month", 'after');
        $this->db->like('ending_date', "$year-$month", 'after');
        $query=$this->db->get();

        $cal_data = array();

        foreach ($query->result() as $row)
        {
           $cal_data[(int)substr($row->date,8,2)] = $row->event;
        }

        return $cal_data;
    }
    
/*
 * Author : Lakini
 * Type : method
 * Name : add_more_calendar_data
 * Parameters:$date,$event
 * Description : This method add new  value for the calander table when 
 * the user inputs them at the runtime.
 */       
function add_more_calendar_data($date, $event)
    {
        $this->db->select('date');
        $this->db->from('calendar');
        $this->db->where('date',$date);
        $set=$this->db->count_all_results();

       if($set>0)
       {
           $this->db->where('date', $date);
           $this->db->update('calendar',array(
               'date' => $date,
               'event' => $event
         ));
       }
  
       else
       {
           $this->db->insert('calendar', array(
           'date' => $date,
           'event' => $event
         ));
       }
    }

/*
 * Author : Lakini
 * Type : method
 * Name : generate
 * Parameters:$year,$month
 * Description : This method generates the calendar by using above methods.
 */       
function generate($year, $month){
    $this->load->library('Calendar',$this->pref);
    $cal_data= $this->get_calendar_data($year, $month);
    var_dump($cal_data);
    //get_datafromOtherTables($year, $month);
    return $this->calendar->generate($year, $month, $cal_data);
     }
  }
?>
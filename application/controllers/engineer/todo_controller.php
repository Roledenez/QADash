<?php
/*
 * Author : Lakini
 * Type : class
 * Name : Todo_controller
 * Description :helps the user and manage the communication between the database and the user. 
 */  
class Todo_controller extends Engineer_Controller{
       		
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index() {
        $this->data['flag'] = null;
        $user_id=$this->session->userdata('username');
        $this->load->model('todo_model');
        $this->data['flag']=0;
        $this->data['task'] = $this->todo_model->getlist($user_id);
        $this->data['subview'] = 'engineer/user/todo_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : addToDo
     * Description :helps the user and add todos. 
     */ 
    public function addToDo() {
        try {           
            $this->load->model('todo_model');
            $user_name=$this->session->userdata('username');
            $task=$_POST['name'];
            
           //$this->data[userid]=$this->todo_model->getUserID($user_name);
            
            $data = array(
                'task' => $task,
                'user_id' => 2,
                'done' =>0,
                'created' => date("Y-m-d")              
            );
            $this->todo_model->addToDO($data);       
            $this->data['flag']=1;
            //$this->data['task'] = $this->todo_model->getlist($user_id);
            $this->data['task'] = 2;
            $this->data['subview'] = 'engineer/user/todo_view';
            $this->load->view("engineer/_layout_main", $this->data);
        } catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    /*
     * Author : Lakini
     * Type : method
     * Name : deleteToDo
     * Parameters:$viewTask
     * Description :helps the user to deletes todos. 
     */ 
    function deleteToDo($viewTask)
    {
    $this->load->model('todo_model');
    $var=str_replace('%20',' ',$viewTask);
    $this->todo_model->deleteToDo($var);   
    }
}


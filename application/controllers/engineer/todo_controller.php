<?php

class Todo_controller extends Engineer_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    /**
     * Name : index
     * Description : This loads the to-do list
     */
    public function index() {
        $this->data['flag'] = null;
        $user_id = $this->session->userdata('uid');
        $this->load->model('todo_model');
        $this->data['flag'] = 0;
        $this->data['task'] = $this->todo_model->getlist($user_id);
        $this->data['subview'] = 'engineer/user/todo_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }

    /**
     * Name : addToDo
     * Description : Add events to todo list
     */
    public function addToDo() {
        try {
            $this->load->model('todo_model');
            $user_id = $this->session->userdata('uid');

            $task = $_POST['name'];
            $data = array(
                'task' => $task,
                'user_id' => $user_id,
                'done' => 0,
                'created' => date("Y-m-d")
            );
            $this->todo_model->addToDO($data);
            $this->data['flag'] = 1;
            $this->data['task'] = $this->todo_model->getlist($user_id);
            redirect("engineer/todo_controller");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : deleteToDo
     * Description : Deletes events from the todo list
     * @param $id - id allocated for an item in the to-do list
     */
    function deleteToDo($id) {
        $this->load->model('todo_model');
        $this->todo_model->deleteToDo($id);
        redirect("engineer/todo_controller");
    }

}

<?php

$this->load->model('todo_model');
$user_name=$this->session->userdata('username');

if(isset($_POST['name']))
{
    $names=trim($_POST['name']);
    
    if(!empty($names))
    {
       
            $data = array(
                'task' => $names,
                'user_id' => $this->todo_model->getUserID($user_name),
                'done' =>0,
                'created' => now()
                            
            );
            $this->todo_model->addToDO($data);
  
    }
}


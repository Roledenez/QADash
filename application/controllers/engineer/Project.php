<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 5:42 PM
 */
class Project extends Engineer_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProjects()
    {
        echo $this->project_m->getProjectsByUser('Hot Bug Fix');
    }

    public function testForm()
    {
        $this->session->set_userdata(array('project_name' => $this->input->post('projectName')));
        redirect("engineer/assignedToMe_controller");
        //echo $this->input->post('projectName');
    }

    public function testProjectSession()
    {
        echo $this->session->userdata('project_name');//$this->session->userdata('project_id');
        
    }

}
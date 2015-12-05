<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Project
 * Description : This class handle all the project related activities
 */
class Project extends Engineer_Controller
{
    /**
     * @author : Roledene
     * Type : Constructor
     * Name : __construct
     * Description : this is the default construtor of project class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @author : Roledene
     * Type : function
     * Name : getProjects
     * Description : this method print all the project by user in html page with json format
     */
    public function getProjects()
    {
        echo $this->project_m->getProjectsByUser('Hot Bug Fix');
    }

    /**
     * @author : Roledene
     * Type : function
     * Name : testForm
     * @deprecated Method deprecated in Release 2.0.0
     * Description : this method for testing purpose
     */
    public function testForm()
    {
        $this->session->set_userdata(array('project_id' => $this->input->post('projectId')));
        redirect("manager/base_controller");
        echo $this->input->post('projectId');
    }

    /**
     * @author : Roledene
     * Type : function
     * Name : testProjectSession
     * @deprecated Method deprecated in Release 2.0.0
     * Description : this method for testing purpose
     */
    public function testProjectSession()
    {
        echo $this->session->userdata('project_id');
    }

}
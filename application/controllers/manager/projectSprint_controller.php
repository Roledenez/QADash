<?php

/**
 * Description of projectSprint_controller
 *
 * @author Ishara1
 */
class ProjectSprint_controller extends Manager_Controller {

    public function __constructor() {
        parent::__constructor();
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */

    public function index() {

        $this->load->model('project_m');
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['sprint'] = null;
        
        $this->data['subview'] = 'manager/user/projectSprint_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /*
     * Auther : Ishara
     * Type : method
     * Name : SprintLoad
     * Description : load sprint details
     */

    public function SprintLoad() {

        //$this->load->model('project_m');
        $id = $this->input->post('projects');
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['sprint'] = $this->project_m->getProjectsSprintDet($id);

        $this->data['subview'] = 'manager/user/projectSprint_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

}


<?php
/**
 * Description of projectSprint_controller
 *
 * @author Ishara1
 */
class ProjectSprint_controller extends Admin_Controller {
    public function __constructor() {
        parent::__constructor();
    }

    public function index() {

          $this->load->model('project_m');
          $this->data['projects'] = $this->project_m->getAllProjectsID();
          $this->data['sprint']=null;
//
        $this->data['subview'] = 'admin/user/projectSprint_view';
        $this->load->view("admin/_layout_main", $this->data);
    }
    
    public function SprintLoad() {

        //$this->load->model('project_m');
        $id = $this->input->post('projects');
        $this->data['projects'] = $this->project_m->getAllProjectsID();
        $this->data['sprint'] = $this->project_m->getProjectsSprintDet($id);

        $this->data['subview'] = 'admin/user/projectSprint_view';
        $this->load->view("admin/_layout_main", $this->data);
    }
}


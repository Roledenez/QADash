<?php

class projectManagement_controller extends Manager_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function index() {
        $this->load->model('project_model');
        $this->data['load_tc'] = -1;
        $this->data['priority'] = $this->project_model->getPriority();
        $this->data['subview'] = 'manager/user/projectManagement_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /**
     * Name : createProject
     * Description : create new test project
     *
     * @throws Some_Exception_Class If can not create a nw project
      cases
     */
    public function createProject() {
        try {
            $this->load->model('project_model');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('projectid', 'Project ID ', 'required');
            $this->form_validation->set_rules('projectname', 'Project Name ', 'required');
            $this->form_validation->set_rules('description', 'Description ', 'required');
            $this->form_validation->set_rules('startingdate', 'Starting Date ', 'required');
            $this->form_validation->set_rules('endingDate', 'Ending Date', 'required');
            $this->form_validation->set_rules('priority', 'Priority ', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            //run the validating
            if ($this->form_validation->run()) {

                $orStartdate = $this->input->post('startingdate');
                $newStaDate = date("Y-m-d", strtotime($orStartdate));

                $orEnddate = $this->input->post('endingDate');
                $newEndDate = date("Y-m-d", strtotime($orEnddate));

                $data = array(
                    'project_id' => $this->input->post('projectid'),
                    'name' => $this->input->post('projectname'),
                    'description' => $this->input->post('description'),
                    'starting_date' => $newStaDate,
                    'ending_date' => $newEndDate,
                    'prority_id' => $this->input->post('priority'),
                    'status' => $this->input->post('status'),
                );
                $this->project_model->addProject($data);
                $pid = $this->input->post('projectid');

                $nSubject = new Notification_m();
                $nSubject->insertNotification($this->session->userdata('uid'), $pid, "Create New Project", "You have created a new project", "Created", site_url() . "manager/projectManagement_controller/LoadProject/$pid");
                redirect("manager/projectManagement_controller/LoadProject/$pid");
            }

            $this->load->model('project_model');
            $this->data['priority'] = $this->project_model->getPriority();
            $this->data['subview'] = 'manager/user/projectManagement_view';
            $this->load->view("manager/_layout_main", $this->data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : LoadProject
     * Description : Load Project details
     *
     * @param  $pid - project ID
      cases
     */
    public function LoadProject($pid) {
        //project id
        $this->data['ppid'] = $pid;
        $this->data['projects'] = $this->project_model->get_projectDetails($pid);
        $this->data['subview'] = 'manager/user/testSuit_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

}

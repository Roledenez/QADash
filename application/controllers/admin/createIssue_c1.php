<?php

class createIssue_c1 extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('createIssue_m1');
    }

    public function index() {
        $this->load->model('createIssue_m1');
  
        $this->data['versions'] = $this->createIssue_m1->loadVersions();
        $this->data['subview'] = 'admin/user/createIssue_v1';
        $this->load->view('admin/_layout_main',$this->data);

        $this->load->library('form_validation');
    }

    public function createIssue() {
        $this->load->model('createIssue_m1');
        $dashboard = ''; //controller path

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('issueId', 'Issue ID ', 'required');
        $this->form_validation->set_rules('issueCode', 'Issue Code', 'required');
        $this->form_validation->set_rules('issueType', 'Issue Type', 'required');
        $this->form_validation->set_rules('description', 'Description ', 'required');
        //$this->form_validation->set_rules('startingdate', 'Starting Date ', 'required');              
        

        //run the validating
        if ($this->form_validation->run() == TRUE) {

            $orStartdate = $this->input->post('startingdate');
            $newStaDate = date("Y-m-d", strtotime($orStartdate));
            $pid = $this->session->userdata('project_id');
            echo $pid;
              
            $data = array(
                'issue_id' => $this->input->post('issueId'),
                'issue_code' => $this->input->post('issueCode'),
                'project_id' => 7,
                'priority_type' => $this->input->post('priority'),                                
                'description' => $this->input->post('description'),                
                'summary' => $this->input->post('summary'),
                'issue_type' => $this->input->post('issueType')
                //'starting_date' => $newStaDate,
                
            );

            $this->createIssue_m1->createIssue($data);
            // $pid =$this->input->post('issueId');
             redirect("admin/viewAllIssues_c");
        }

        // $this->load->model('createIssue_m1');
        // $this->data['priority'] = $this->project_model->getPriority();
        // $this->data['subview'] = 'manager/user/projectManagement_view';
        // $this->load->view("manager/_layout_main", $this->data);
    }
  
}

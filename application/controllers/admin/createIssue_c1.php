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

    public function createIssue() 
    {
        $this->load->model('createIssue_m1');
        $dashboard = ''; //controller path            

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('issueCode', 'Issue Code', 'required');
        $this->form_validation->set_rules('issueType', 'Issue Type', 'required');
        $this->form_validation->set_rules('description', 'Description ', 'required');
         

        //run the validating
        if ($this->form_validation->run() == TRUE) {

            $currentDate = date("Y/m/d");        

            $pid = $this->session->userdata('project_id');            
            $uid = $this->session->userdata('uid');

            $name = $this->createIssue_m1->getSignedInUser($uid);
            $name = $name[0]->name;

            $lastId = $this->createIssue_m1->getLastIssueId($pid);
            $lastId = $lastId[0]->last + 1;
                      
            $data = array(
                'issue_id' => $lastId,
                'issue_code' => $this->input->post('issueCode'),
                'project_id' => $pid,
                'priority_type' => $this->input->post('priority'),
                'member_id' => $uid,
                'created_by' => $name,
                'description' => $this->input->post('description'),                
                'summary' => $this->input->post('summary'),
                'issue_type' => $this->input->post('issueType'),
                'created_date' => $currentDate,
                'availability_status' => 1             
            );

            $this->createIssue_m1->createIssue($data);
            redirect("admin/viewAllIssues_c");
        }

        // $this->load->model('createIssue_m1');
        // $this->data['priority'] = $this->project_model->getPriority();
        // $this->data['subview'] = 'manager/user/projectManagement_view';
        // $this->load->view("manager/_layout_main", $this->data);
    }
  
}

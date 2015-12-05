<?php
/*
 * Author : Lakini
 * Type : class
 * Name : AllocateMember_controller
 * Description : maintain the allocation of members for a particular project. 
 */  
class AllocateMember_controller extends Manager_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function index() {
        $this->data['flag'] = null;
        $this->load->model('member_model');
        $this->data['members'] = $this->member_model->getMembers();
        $this->data['subview'] = 'manager/user/allocateMember_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /*
     * Author : Lakini
     * Type : method
     * Name : addMembers
     * Description : maintain the allocation of members for a particular
     *  project and this passes the parameters to model method. 
    */ 
    public function addMembers() {
        try {       
            $pid = $this->session->userdata('project_id');
            $this->load->model('member_model');
            $data = array(
                'project_id' => $pid,
                'member_id' => $this->input->post('member'),
            );
            $this->member_model->addMember($data);
            $this->data['flag'] = 1;
            $this->data['mem'] = $this->member_model->getMembersForTable($pid);
            $this->data['members'] = $this->member_model->getMembers();
            $this->data['subview'] = 'manager/user/allocateMember_view';
            $this->load->view("manager/_layout_main", $this->data);
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    /*
     * Author : Lakini
     * Type : method
     * Name : deleteMembers
     * Parameters:$memID
     * Description : helps the user to delete members from the project. 
    */ 
    public function deleteMembers($memID) {
        try {           
            $pid = $this->session->userdata('project_id');
            $this->load->model('member_model');
            $this->member_model->deleteMember($pid,$memID);
            $this->data['flag'] = 1;
            $this->data['mem'] = $this->member_model->getMembersForTable($pid);
            $this->data['members'] = $this->member_model->getMembers();
            $this->data['subview'] = 'manager/user/allocateMember_view';
            $this->load->view("manager/_layout_main", $this->data);
        } catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
}

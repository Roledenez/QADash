<?php
 
class AllocateMember_controller extends Manager_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

   /**
    * Name : index
    * Description : load modela dn set data of the allocate member function
    */
    public function index() {
        $pid = $this->session->userdata('project_id');
        $this->data['flag'] = null;
        $this->load->model('member_model');
        $this->data['members'] = $this->member_model->getMembers($pid);
        $this->data['projMem'] = $this->member_model->get_projectmembers($pid);
        $this->data['subview'] = 'manager/user/allocateMember_view';
        $this->load->view("manager/_layout_main", $this->data);
    }

    /**
     * Name : addMembers
     * Description : add members to the project
     * @throws Exception if the memebers can't  add to the project
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
            $nSubject = new Notification_m();
            $nSubject->insertNotification($this->input->post('member'), $pid, "Assigned For the Project", "You have assigned to a new Project", "Assigned", site_url() . "engineer/base_controller");
            $this->data['flag'] = 1;
            $this->data['mem'] = $this->member_model->getMembersForTable($pid);
            $this->data['members'] = $this->member_model->getMembers($pid);
            $this->data['projMem'] = $this->member_model->get_projectmembers($pid);
            $this->data['subview'] = 'manager/user/allocateMember_view';
            $this->load->view("manager/_layout_main", $this->data);
        } 
        catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
     * Name : deleteMembers
     * Description : helps the user to delete members from the project.
     * @throws Exception if the memebers can't  delete from the project
     */
    public function deleteMembers($memID) {
        try {           
            $pid = $this->session->userdata('project_id');
            $this->load->model('member_model');
            $this->member_model->deleteMember($pid,$memID);
            $this->data['flag'] = 1;
            $this->data['mem'] = $this->member_model->getMembersForTable($pid);
            $this->data['members'] = $this->member_model->getMembers($pid);
            $this->data['projMem'] = $this->member_model->get_projectmembers($pid);
            $this->data['subview'] = 'manager/user/allocateMember_view';
            $this->load->view("manager/_layout_main", $this->data);
        } catch (Exception $exc) 
        {
            echo $exc->getTraceAsString();
        }
    }
}

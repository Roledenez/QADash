<?php
/**
 * Description of assignedToMe_controller
 *
 * @author Ishara1
 */
class AssignedToMe_controller extends Engineer_Controller {
    public function __constructor() {
        parent::__constructor();
        $this->load->model('user_m');
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : index
     * Description : index method
     */

    public function index() {
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['project'] = $this->user_m->getAllProjectsID();
        $this->data['assignedTC']= null;
        $this->data['Issues']=null;
        $this->data['chart']=null;
        
        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
        
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : AssignedJobsLoad
     */
    public function AssignedJobsLoad() {
        $this->data['chart'] = $this->input->post('projects');
        $pid = $this->input->post('projects');
        $uid = $this->session->userdata('uid');
        $this->data['projectsDet'] = $this->user_m->get_userProjectDet($uid);
        $this->data['project'] = $this->user_m->getAllProjectsID();
        
        $this->data['Issues']= $this->user_m->getAssignedIssues($pid, $uid);
        $this->data['assignedTC']=$this->user_m->getAssignedTestCases($pid, $uid);
        
        $this->data['subview'] = 'engineer/user/assignedToMe_view';
        $this->load->view("engineer/_layout_main", $this->data);
    }
    /*
     * Auther : Ishara
     * Type : method
     * Name : drawChart
     */
    public function drawChart() {
        $mid = $this->session->userdata('uid');
        $data = $this->user_m->get_projectAllocTime($mid);

        $category = array();
        $category['name'] = 'Category';

        $series1 = array();
        $series1['name'] = 'Allocated Hours';
        
        $series2 = array();
        $series2['name'] = 'Spent Hours';


        foreach ($data as $row) {
            $category['data'][] = $row->name;
            $series1['data'][] = $row->assigned_hours;
            $series2['data'][] = $row->spent_hours;
         
        }

        $result = array();
        array_push($result, $category);
        array_push($result, $series1);
        array_push($result, $series2);
         
    

        print json_encode($result, JSON_NUMERIC_CHECK);

        return $result;
    }
}

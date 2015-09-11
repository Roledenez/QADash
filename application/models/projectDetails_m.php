<?php
class projectDetails_m extends My_Model {

    public function __construct(){
	parent::__construct();                       
    }

    public function getProjectDetails($id) {
        
        $sql_1 = "select pm.project_id as ProjectID,p.name AS ProjectName,p.description AS ProjectDescription from project p,project_member pm where p.project_id=pm.project_id and p.project_id=$id group by p.project_id"; 

        return $this->db->query($sql_1, array($id))->result();
    }
    
    public function getAllAssignees($id) {
        
        $sql_2 = "select pm.member_id as AssigneeID,concat(m.firstname,' ',m.lastname) as Name from project_member pm, member m where m.member_id=pm.member_id and pm.project_id=$id"; 

        return $this->db->query($sql_2, array($id))->result();
    }
    
    public function getNoOfTestsuites($id){
        
        $sql_3 = "select count(testsuites_id)as numTestsuites from testsuites ts where ts.project_id = $id";
        
//        $sql_6 = $this->db->select('count(testsuites_id) as numTestsuites')
//                ->from('testsuites')
//                ->where('project_id', $id)
//                ->get();
        
        return ($this->db->query($sql_3,array($id))->result());
    }
     
    public function getOpenTestsuites($id) {
        
        $sql_4 = "select count(testsuites_id)as numOpenTestsuites from testsuites ts where ts.project_id = $id and ts.status = 1"; 

        return $this->db->query($sql_4, array($id))->result();
    }
    
    public function getClosedTestsuites($id) {
        
        $sql_5 = "select count(testsuites_id)as numClosedTestsuites from testsuites ts where ts.project_id = $id and ts.status = 0"; 

        return $this->db->query($sql_5, array($id))->result();
    }
    
    
}
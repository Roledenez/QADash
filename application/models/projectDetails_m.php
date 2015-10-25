<?php
class projectDetails_m extends My_Model 
{

    public function __construct()
    {
	parent::__construct();                       
    }

    public function getProjectDetails($id) 
    {
        
        try
        {
        $sql_1 = "select pm.project_id as ProjectID,"
                . "p.name AS ProjectName,"
                . "p.description AS ProjectDescription "
                . "from project p,project_member pm "
                . "where p.project_id=pm.project_id "
                . "and p.project_id=$id group by p.project_id"; 

        return $this->db->query($sql_1, array($id))->result();
        
//        $this->db->select('pm.project_id as ProjectID, p.name AS ProjectName, p.description AS ProjectDescription');
//        $this->db->from('project p');
//        $this->db->join('project_member pm','p.project_id=pm.project_id');
//        $this->db->where('pm.project_id',$id);
//        $this->db->group_by('p.project_id');
//        $method = "result";
//        $result = $this->db->get()->$method();
//        return $result;
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    public function getAllAssignees($id) 
    {
        
        try
        {
        $sql_2 = "select pm.member_id as AssigneeID,"
                . "concat(m.firstname,' ',m.lastname) as Name "
                . "from project_member pm, "
                . "member m where m.member_id=pm.member_id "
                . "and pm.project_id=$id"; 

        return $this->db->query($sql_2, array($id))->result();

//        $this->db->select('pm.member_id as AssigneeID, concat(m.firstname," ",m.lastname) as Name');
//        $this->db->from('project_member as pm');
//        $this->db->join('member as m','m.member_id=pm.member_id');
//        $this->db->where('pm.project_id',$id);
//        $method = "result";
//        $result = $this->db->get()->$method();
//        return $result;
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
        
    }
    
    public function getNoOfTestsuites($id)
    {
        
        try
        {
//        $sql_3 = "select count(testsuites_id)as numTestsuites from testsuites ts where ts.project_id = $id";
//        return ($this->db->query($sql_3,array($id))->result());
        
        $this->db->select('count(testsuites_id)as numTestsuites');
        $this->db->from('testsuites ts');
        $this->db->where('ts.project_id',$id);
        $method = "result";
        $result = $this->db->get()->$method();
        return $result;
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
     
    public function getOpenTestsuites($id)
    {
        
        try
        {
//        $sql_4 = "select count(testsuites_id)as numOpenTestsuites from testsuites ts where ts.project_id = $id and ts.status = 1"; 
//
//        return $this->db->query($sql_4, array($id))->result();
        
        $where = "ts.project_id = $id and ts.status = 1";
        
        $this->db->select('count(testsuites_id)as numOpenTestsuites');
        $this->db->from('testsuites ts');
        $this->db->where($where);
        $method = "result";
        $result = $this->db->get()->$method();
        return $result;
        }
         catch (Exception $e)
         {
             echo 'Message: ' .$e->getMessage();
         }
    }
    
    public function getClosedTestsuites($id)
    {
        
        try
        {
        $sql_5 = "select count(testsuites_id)as numClosedTestsuites from testsuites ts where ts.project_id = $id and ts.status = 0"; 

        return $this->db->query($sql_5, array($id))->result();
        
//        $where = "ts.project_id = $id and ts.status = 0";
//        
//        $this->db->select('count(testsuites_id)as numClosedTestsuites');
//        $this->db->from('testsuites ts');
//        $this->db->where($where);
//        $method = "result";
//        $result = $this->db->get()->$method();
//        return $result;
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
    
    
}
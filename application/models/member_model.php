<?php
/*
 * Author : Lakini
 * Type : class
 * Name : member_model
 * Description :  maintain the members of a particular project. 
 */   
class member_model extends My_Model {
    /*
     * Author : Lakini
     * Type : method
     * Name : getMembers
     * Description : gets the current available members in the company. 
     */ 
    function getMembers($pid) {
        try {
            $query = "SELECT u.users_id,u.firstName,u.lastName FROM users u where u.users_id  NOT IN (select U.users_id from users u, project_member p where u.users_id= p.member_id
and p.project_id='$pid')";
            $result = $this->db->query($query);
            foreach ($result->result_array() as $row) {
                $data[$row['users_id']] = $row['firstName'];
            }
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : getMembersForTable
     * Parameters:$pid
     * Description :  collects members for the drop down. 
     */ 
    function getMembersForTable($pid) {
        try {
            $query = "SELECT u.firstName,u.users_id FROM users u, project_member p WHERE p.member_id = u.users_id and p.project_id ='$pid'";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : addMember
     * Parameters:$data
     * Description :  add members for the particular project. 
     */ 
    public function addMember($data) {
        try {
           $this->db->insert('project_member',$data);
        } catch (Exception $exc) {
           echo $exc->getTraceAsString();
        }   
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : deleteMember
     * Parameters:$pid,$memID
     * Description : delete members from the given project. 
     */ 
    public function deleteMember($pid,$memID){
        try {
            $query = "DELETE FROM project_member WHERE project_id='$pid' and member_id=$memID";
            $result = $this->db->query($query);       
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }       
    }
    
    function get_projectmembers($pid) {
        try {
            $query = "SELECT uername FROM project_member p, users u WHERE p.member_id=u.users_id and p.project_id=$pid";
            $result = $this->db->query($query);
            return $result->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

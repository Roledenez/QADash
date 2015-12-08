<?php

class member_model extends My_Model {

    /**
     * Name : getMembers
     * Description : gets the current available members for the project.
     * @param $pid - id of the project
     * @throws Exception if can't get the members for the given project
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

    /**
     * Name : getMembersForTable
     * Description : collects members for the drop down.
     * @param $pid - id of the project
     * @throws Exception if can't get the members for the given project
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

    /**
     * Name : addMember
     * Description : add members for the particular project.
     * @param $data - members id
     * @throws Exception if can't add members to the database
     */
    public function addMember($data) {
        try {
            $this->db->insert('project_member', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : deleteMember
     * Description : delete members from th egiven project.
     * @param $pid - Project id
     * @param $memID - members ID
     * @throws Exception if can't delete members to the database
     */
    public function deleteMember($pid, $memID) {
        try {
            $query = "DELETE FROM project_member WHERE project_id='$pid' and member_id=$memID";
            $result = $this->db->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : get_projectmembers
     * Description : get current members for the project
     * @param $pid - Project id   
     * @throws Exception if can't get members of the given project
     */
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

<?php

class todo_model extends My_Model {

    /**
     * Name : getlist
     * Description : get the current stored list from the database for a given user.
     * @param $user_id - users id
     * @throws Exception if can't get a result for the given User_id
     * @return row
     */
    function getlist($user_id) {
        try {
            $query = "SELECT id,task,done from todolist WHERE done=0 AND user_id= $user_id";
            $result = $this->db->query($query);
            $row = $result->result();
            return $row;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : getUserID
     * Description : get the User Id for given logged user.
     * @param $user_name - user name
     * @return row
     */
    function getUserID($user_name) {
        $query = "SELECT distinct s.users_id from todolist t,users s where t.user_id=s.users_id and s.firstName='$user_name'";
        $result = $this->db->query($query);
        $row = $result->result();
        return $row;
    }

    /**
     * Name : addToDO
     * Description : adds new todos to the database.
     * @param $data - item details
     * @throws Exception if there is an error occured when insertinf data
     */
    function addToDO($data) {
        try {
            $this->db->insert('todolist', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Name : deleteToDo
     * Description : deletes user prefered todos.
     * @param $id - id of the item to delete
     * @throws Exception if the item fro a given id can't delete
     */
    function deleteToDo($id) {

        try {
            $query = "DELETE FROM todolist WHERE id='$id'";
            $result = $this->db->query($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

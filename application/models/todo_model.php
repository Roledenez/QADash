<?php
/*
 * Author : Lakini
 * Type : class
 * Name : todo_model
 * Description : maintain the todo list of the user. 
 */    
class todo_model  extends My_Model {
    
    /*
     * Author : Lakini
     * Type : method
     * Name : getlist
     * Parameters : $user_id
     * Description :  get the current stored list from the database for a given user.
     */   
    function getlist($user_id) {
        try {
            $query = "SELECT id,task,done from todolist WHERE done=0 AND user_id= $user_id";
            $result = $this->db->query($query);  
            $row = $result->result();          
            return $row;           
           } 
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : getUserID
     * Parameters : $user_name
     * Description : get the User Id for given logged user.
     */  
    function getUserID($user_name)
    {
        $query = "SELECT distinct s.users_id from todolist t,users s where t.user_id=s.users_id and s.firstName='$user_name'";
        $result = $this->db->query($query);  
        $row = $result->result(); 
        return $row;
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : addToDO
     * Parameters : $data
     * Description : adds new todos to the database.
     */  
    function addToDO($data) {
        try {
            $this->db->insert('todolist',$data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /*
     * Author : Lakini
     * Type : method
     * Name : deleteToDo
     * Parameters : $task
     * Description :deletes user prefered todos.
     */  
    function deleteToDo($id){    
        //var_dump($task);
        try {               
            $query = "DELETE FROM todolist WHERE id='$id'";
            $result = $this->db->query($query);                     
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }      
    }
}

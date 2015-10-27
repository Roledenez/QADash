<?php
class closedTestsuites_model extends My_Model 
{

    public function __construct()
    {
	parent::__construct();                       
    }

    public function getAllClosedTestsuitesDetails($id) 
    {
        
        try{
        $sql_1 = "select * from testsuites where project_id = $id and status = 0"; 

        return $this->db->query($sql_1, array($id))->result();
        }
        
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }  
    
}
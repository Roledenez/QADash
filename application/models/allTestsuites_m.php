<?php
class allTestsuites_m extends My_Model
{

    public function __construct()
    {
	parent::__construct();                       
    }

    
    public function getAllTestsuitesDetails($id)
    {
        
        try{
        $this->db->select('*');
        $this->db->from('testsuites');
        $this->db->where('project_id',$id);
        
        $method =  "result";
        
        $result = $this->db->get()->$method();
        
        return $result;   
        }
        catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }  
    
}
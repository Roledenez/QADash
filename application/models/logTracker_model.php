<?php
		/*
		 * Auther : Binalie
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class logTracker_model extends My_Model
        {
                     
            
		/*
		 * Auther : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of projectLoader_m class
		 */
		public function __construct()
                {
			parent::__construct();
                       
		}               

                
        public function displaySessionData()
        {
                    
            try{
            $sql_1 = "SELECT s.session_id as sessionID, "
                    . "s.ip_address as IPAddress, "
                    . "concat(u.firstName,' ',u.lastName) as usersName, "
                    . "s.session_start_date as start_date, "
                    . "s.session_start as session_start_time, "
                    . "s.session_end_date as end_date, "
                    . "s.session_end as session_end_time "
                    . "FROM sessions s "
                    . "INNER JOIN users u ON s.users_id = u.users_id";

            
            $x = $this->db->query($sql_1)->result();
            
            return $x;
            }
            
            catch(Exception $e)
            {
                echo 'Message: ' .$e->getMessage();
            }
                
        }
    }
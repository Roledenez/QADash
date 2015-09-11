<?php
		/*
		 * Auther : Binalie
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class projectLoader_m extends My_Model{
            
            protected $_table_name = "project";
            protected $_timestamps = FALSE;           
            
		/*
		 * Auther : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of projectLoader_m class
		 */
		public function __construct(){
			parent::__construct();
                       
		}               

                
                public function displayAllProjects(){
                    
                    $projectD = $this->get();
                    //var_dump($projectD);

                    if (count($projectD)) 
                    {		                   
                        return $projectD;
                    }

                    return $projectD;

                }
        }

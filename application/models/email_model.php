<?php

// RUD Operations for email class functions

class Email_model extends My_Model {

    // table name of the database
    protected $_table_name = "member";
    // order by clouse
    protected $_order_by = "";
    protected $_timestamps = FALSE;
    // output data holder
    public $data = array();
    // constructor
    public function __construct(){
        parent::__construct();
    }

    /*
		 * Auther : Roledene
		 * Type : method
		 * Name : getAllProjects
		 * Description : this method return all the project tuples in project table
		 */
    public function getAllMemberEmails(){
        try{
            $emails = $this->get();
            if (count($emails)) {// if project found
                // var_dump($project);
                $data = null;
                $i = 0;
                while (count($emails)>$i) {
                    $data[$i]  = array(
                        'member_id' => $emails[$i]->member_id,
                        'firstName' => $emails[$i]->fname,
                        'lastName' => $emails[$i]->lname,
                        'email' => $emails[$i]->email,
                        'role' => $emails[$i]->role

                    );
                    $i++;
                }
                return $data;
            }else{ // if there wasn't any projects

                return null;
            }

        }catch (EmailException $e){
            echo "Error occurred while trying to retrieve email list\n", $e;
            return null;
        }

    }


}
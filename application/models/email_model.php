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
		 * Auther : Chathuri
		 * Type : method
		 * Name : getAllMemberEmails
		 * Description : this method return all the email list of members in member table
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
                        'email' => $emails[$i]->email

                    );
                    $i++;
                }
                return $data;
            }else{

                return null;
            }

        }catch (Exception $e){
            echo new EmailException("Error occurred while trying to retrieve email list\n", $e);
            return null;
        }

    }


}
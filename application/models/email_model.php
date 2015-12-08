<?php

class Email_model extends My_Model {

    // table name of the database
    protected $_table_name = "member";
    protected $_order_by = "";
    protected $_timestamps = FALSE;
    public $data = array();
    
    // constructor
    public function __construct(){
        parent::__construct();
    }

    /**
     * Name : getAllMemberEmails
     * Description : this method return all the email list of members in member table
     * 
     * @return member's email addresses
     */
    public function getAllMemberEmails(){

        try{
            $emails = $this->get();
            if (count($emails)) {
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
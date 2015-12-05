<?php

class Email_Config{

    /**
     * Constructor
     */
    public function __construct(){}

    /**
     * This method will return the email configurations
     * @return array $config configurations for emailing
     */
    public function emailConfig()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'qadash123@gmail.com',
            'smtp_pass' => 'igvmevuigbupqqbe',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        return $config;
    }

}

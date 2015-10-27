<?php


class Email_controller extends Admin_Controller
{

    /**
     * Constructor withe the required library classes loaded
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        //load the email configuration class
        $this->load->library('email_config');
    }

    public function index()
    {
        $this->load->model('email_model');
        $this->data['emails'] = $this->email_model->getAllMemberEmails();
        $this->data['subview'] = 'admin/user/email/email_view';
        $this->load->view("admin/_layout_main", $this->data);
    }

    /**
     * Send the email to the relevant recipients
     */
    function sendmail()
    {
        //create an object from the email config class to reuse the methods
        $emailConfig = new email_config();
        //call the function emailConfig() to load the email configurations
        $emailConfigurations = $emailConfig->emailConfig();

        //load values for subject,body,and the email list from front end
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');
        $emails = $this->input->post('emails');

        $emailList = "";
        $i = 0;
        //loop through the email list and extract the specific emails
        foreach ($emails as $email) {

            if ($i == 0) {
                $emailList = $email;
                $i = $i + 1;
            }else{
                $emailList = $emailList .",". $email ;
            }
        }

        //Load the email library and send the email Configurations
        $this->load->library('email',$emailConfigurations);

        //call the email library functions to set the required details for the email structure
        $this->email->set_newline("\r\n");
        $this->email->from('sermountengineers@gmail.com');
        $this->email->to($emailList);
        $this->email->subject($subject);
        $this->email->attach('C:/Users/Piya/Desktop/reports/report.pdf');
        $this->email->message($body);

        //call the email library send function to send the email
        if ($this->email->send()) {

            echo 'Emails sent successfully';
        } else {
            show_error($this->email->print_debugger());
        }

    }


//    public function loadEmailList()
//    {
//
//        $this->data['subview'] = 'admin/user/email/email_view';
//        $this->load->view("admin/_layout_main", $this->data);
//    }

}

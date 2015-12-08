<?php

class Email_controller extends Admin_Controller {

    /**
     * Constructor withe the required library classes loaded
     */
    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        $this->load->library('email_config');
        $this->load->helper("file");
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        echo $this->session->userdata('project_id');
        $this->load->model('email_model');
        $this->data['emails'] = $this->email_model->getAllMemberEmails();
        $this->data['subview'] = 'admin/user/email/email_view';
        $this->load->view("admin/_layout_main", $this->data);
    }

    /**
     * Name : sendmail
     * Description : Send new email
     *
     */
    function sendmail() {
        //create an object from the email config class to reuse the methods
        $emailConfig = new email_config();
        //call the function emailConfig() to load the email configurations
        $emailConfigurations = $emailConfig->emailConfig();
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');
        $emails = $this->input->post('to');


        $this->form_validation->set_rules('to', 'Email', 'required|callback_validate_email_list');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->data['subview'] = 'admin/user/email/email_view';
            $this->load->view("admin/_layout_main", $this->data);
            return;
        } else {
            $this->load->library('email', $emailConfigurations);

            //call the email library functions to set the required details for the email structure
            $this->email->set_newline("\r\n");
            $this->email->from('qadash123@gmail.com');
            $this->email->to($emails);
            $this->email->subject($subject);
            $myVar = $_SESSION['file'];
            $path = getcwd();
            $this->email->attach(str_replace('\\', "/", $path) . '/reports/' . $myVar);
            $this->email->message($body);

            if ($this->email->send()) {
                echo '<script>alert("Email Sent Successfully!");</script>';
                $this->data['subview'] = 'admin/user/email/email_success_view';
                $this->data['subview'] = 'admin/user/email/email_view';
                $this->load->view("admin/_layout_main", $this->data);
            } else {
                echo '<script>alert("Error occurred while sending the email.Please check your internet connection!");</script>';
                $this->data['subview'] = 'admin/user/email/email_unsuccess_view';
                $this->data['subview'] = 'admin/user/email/email_view';
                $this->load->view("admin/_layout_main", $this->data);
            }
            return;
        }
    }

    /**
     * Name : validate_email_list
     * Description : validate each email address
     * @param $emailList email list separated by ,
     * 
     * @return bool if all the emails are valid
     */
    public function validate_email_list($str) {
        $ArrayList = explode(",", $str);
        foreach ($ArrayList as $address) {
            if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('validate_email_list', 'Email/emails are invalid.Re check the email syntax');
                return FALSE;
            }
        }
        return true;
    }

    /**
     * Name : getAttatchment
     * Description : Get Attatchments for email
     *
     */
    public function getAttatchment() {
        $this->data['subview'] = 'admin/user/email/email_view';
        $this->load->view("admin/_layout_main", $this->data);
        $fileName = $this->input->get('filename');
        $_SESSION['file'] = $fileName;
    }

}

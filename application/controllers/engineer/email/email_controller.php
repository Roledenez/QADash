<?php


class Email_controller extends Engineer_Controller
{
    /**
     * Constructor withe the required library classes loaded
     */
    public function __construct()
    {
        parent::__construct();

        //libraries for form validation
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        //load the email configuration class
        $this->load->library('email_config');
        //file handling library
        $this->load->helper("file");
        //get base url
        $this->load->helper('url');
        //retain session data
        $this->load->library('session');
    }

    public function index()
    {
        echo  $this->session->userdata('project_id');
        $this->load->model('email_model');
        $this->data['emails'] = $this->email_model->getAllMemberEmails();
        $this->data['subview'] = 'engineer/user/email/email_view';
        $this->load->view("engineer/_layout_main", $this->data);

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
        $emails = $this->input->post('to');


        $this->form_validation->set_rules('to', 'Email', 'required|callback_validate_email_list');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->data['subview'] = 'engineer/user/email/email_view';
            $this->load->view("engineer/_layout_main", $this->data);
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
            $this->email->attach(str_replace('\\',"/",$path).'/reports/'.$myVar);
            $this->email->message($body);

            //call the email library send function to send the email
            if ($this->email->send()) {
                echo '<script>alert("Email Sent Successfully!");</script>';
                $this->data['subview'] = 'engineer/user/email/email_success_view';
                $this->data['subview'] = 'engineer/user/email/email_view';
                $this->load->view("engineer/_layout_main", $this->data);
            } else {
                echo '<script>alert("Error occurred while sending the email.Please check your internet connection!");</script>';
                $this->data['subview'] = 'engineer/user/email/email_unsuccess_view';
                $this->data['subview'] = 'engineer/user/email/email_view';
                $this->load->view("engineer/_layout_main", $this->data);
            }
            return;
        }

    }

    /**
     * Name : validate_email_list
     * Description : validate each email address
     * @param $emailList email list separated by ,
     * @return bool if all the emails are valid
     */
    public function validate_email_list($str)
    {
        $ArrayList = explode(",", $str);
        foreach ($ArrayList as $address) {
            if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('validate_email_list', 'Email/emails are invalid.Re check the email syntax');
                return FALSE;
            }
        }
        return true;
    }

    public function getAttatchment(){
        $this->data['subview'] = 'engineer/user/email/email_view';
        $this->load->view("engineer/_layout_main", $this->data);
        $fileName = $this->input->get('filename');
        $_SESSION['file'] = $fileName;
    }


}

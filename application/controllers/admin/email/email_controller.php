<?php



class Email_controller extends Admin_Controller{



    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
    }

    public function index(){
        $this->data['subview'] = 'admin/user/email/email_view';
        $this->load->view("admin/_layout_main",$this->data);
    }

    function sendmail()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'sermountengineers@gmail.com',
            'smtp_pass' => 'tzhpbaybzbecbswd', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = '';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('sermountengineers@gmail.com');

        $this->email->to('chathurigamage17@gmail.com');
        $this->email->subject('CodeIgniter and smtp');
        $this->email->attach('C:/Users/Piya/Desktop/reports/report.pdf');
        $this->email->message('send mail using CodeIgniter and smtp');
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }

    }


    public function loadEmailList(){

    }

}

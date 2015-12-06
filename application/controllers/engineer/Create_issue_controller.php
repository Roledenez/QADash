<?php

/**
 *
 * @package     application
 * @category    controller
 * @author      Binalie Liyanage 
 *@class name   Create_issue_controller
 *@desciption   issue creation controller
 */

class Create_issue_controller extends Engineer_Controller {

    /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@method name  constructor
     *@desciption   constructor of issue creation controller
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Create_issue_model');
    }

    /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@method name  index
     *@parameters   no parameters
     *@desciption   index function of issue creation controller
     */
    public function index() {        

        //Load the model class of the Create_issue_controller class
        $this->load->model('Create_issue_model');   

        //Load the view of the Create_issue_Controller class    
        $this->data['subview'] = 'engineer/user/Create_issue_view';
        $this->load->view('engineer/_layout_main',$this->data);       
    }

    /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@method name  create_issue 
     *@parameters   no parameters
     *@desciption   gets data entered from the view and pass to model class
     */
    public function create_issue() 
    {
        try
        {
            //load the required libraries
            $this->load->library('upload');            
            $this->load->library('form_validation');

            //load the model class
            $this->load->model('Create_issue_model'); 
            
            //set delimeterd for error validations
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            //set rules for validations
            $this->form_validation->set_rules('issueCode', 'Issue Code', 'required');
            $this->form_validation->set_rules('summary', 'Summary', 'required');
            $this->form_validation->set_rules('description', 'Description ', 'required');
            $this->form_validation->set_rules('issueType', 'Issue Type ', 'required');
            $this->form_validation->set_rules('priority', 'Priority ', 'required');

            
            //run the validation
            if ($this->form_validation->run()) 
            {     
                //get current date         
                $current_date = date("Y/m/d");        

                //get the project id of the initially selected project
                $pid = $this->session->userdata('project_id');        

                //get the user id of the logged in user    
                $uid = $this->session->userdata('uid');

                //get id of the project manager of the project
                $project_manager = $this->Create_issue_model->get_project_manager($pid);
                $pm_id = $project_manager[0]->member_id;

                //get the name of the logged in user
                $name = $this->Create_issue_model->get_signed_in_user($uid);
                $name = $name[0]->name;

                //get the issue id of the last entered record
                $last_id = $this->Create_issue_model->get_last_issue_id($pid);

                //calculate the id of the record to be entered
                $curr_id = $last_id[0]->last + 1;
                          
                //create an array of the data enetered by the user in the interface
                $data = array(
                    'issue_id' => $curr_id,
                    'issue_code' => $this->input->post('issueCode'),
                    'project_id' => $pid,
                    'priority_type' => $this->input->post('priority'),
                    'member_id' => $uid,
                    'created_by' => $name,
                    'description' => $this->input->post('description'),                
                    'summary' => $this->input->post('summary'),
                    'issue_type' => $this->input->post('issueType'),
                    'created_date' => $current_date,
                    'availability_status' => 1             
                );

                //send the array of user entered data to the model class
                $this->Create_issue_model->create_issue($data);

                //count the number of files attached by the user
                $count = count($_FILES['userfile']['name']);
                $files = $_FILES;

                //get the details of the image files attached
                for($i = 0; $i < $count; $i++)
                {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];

                    $this->upload->initialize($this->setup_upload_option());

                    // if ($this->upload->createIssue())
                    // {

                        $data = $this->upload->data();
                        
                        //adding the image details to an array to be sent to the database
                        $dataArray = array(
                                        'issue_id' => $curr_id,
                                        'img_name' => $_FILES['userfile']['name'],
                                        'img_size' => $_FILES['userfile']['size'],
                                        'img_ext' => $_FILES['userfile']['type'],
                                        'full_path' => $data['full_path']
                            );

                        //sending the data array to the model class
                        $this->Create_issue_model->upload_images($dataArray);
                    //}
                }
                        //getting the id the last notification record added to the database
                        $notification_id = $this->Create_issue_model->get_last_notification_id($pid);

                        //calculating the notification id for the next record to be added
                        $current_notification_id = $notification_id[0]->last_notification_id + 1;

                        //calling the model class of the Nottification class
                        $nSubject = new Notification_m();

                        //send notification to the crrently logged in user regarding the newly created issue
                        ////////////////////doooooooooooooooooooooo
                        //$nSubject->insertNotification($current_notification_id, $uid, $pid, "Create New Issue", "You have created a new issue", "Created", site_url() . "engineer/View_issue_details_controller/$curr_id");

                        //send notification to the project manager regarding the newly created issue
                        //dppooooooooooooooooooooooooooooo
                        //$nSubject->insertNotification($current_notification_id+1, $pm_id, $pid, "Create New Issue", "New Issue has been created", "Created", site_url() . "engineer/View_issue_details_controller/$curr_id");

                        //rediect to the View_all_issues_controller after a successful issue creation
                        redirect("engineer/View_all_issues_controller");

                } 
            
            //if the issue creation was not successful load the same issue creation page
            $this->data['subview'] = 'engineer/user/Create_issue_view';
            $this->load->view('engineer/_layout_main',$this->data); 

        }
        catch (Exception $exc) {        
            echo $exc->getTraceAsString();
        }
    }

    /**
     *
     * @package     application
     * @category    controller
     * @author      Binalie Liyanage 
     *@method name  setup_upload_option 
     *@parameters   no parameters
     *@desciption   setting up sonfigurations to the image upload function
     */
    public function setup_upload_option()
    {       
        //adding the configurations to an array to be returned
        $config = array();
            $config['upload_path'] = 'http://localhost:8090/QADash/public_html/uploads';
            $config['allowed'] = "gif|jpg|png|jpeg|pdf";
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;
            return $config;
    }

}
  


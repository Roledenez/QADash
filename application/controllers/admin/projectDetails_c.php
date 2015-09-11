<?php
		/*
		 * Auther : Binalie
		 * Type : class
		 * Name : users
		 * Description : This class handle all the user related activities
		 */
	class projectDetails_c extends Admin_Controller{
		/*
		 * Auther : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of User class
		 */
		public function __construct(){
			parent::__construct();
                        $this->load->model("projectDetails_m");
		}

                /*
		 * Auther : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the all users sub view
		 */
                
                public function index()
                {
                $aaa=$_GET['var'];
                //$aaa = filter_input(INPUT_GET, 'var', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
                
                echo 'GET passed';
                $this->load->model('projectDetails_m');
                
		$this->data['value_1'] = $this->projectDetails_m->getProjectDetails($aaa);
               
                //$abc_1['value_2'] = $this->projectDetails_m->getAllAssignees($aaa);
                $this->data['value_2'] = $this->projectDetails_m->getAllAssignees($aaa);
                
                $this->data['value_3'] = $this->projectDetails_m->getNoOfTestsuites($aaa);
                
                $this->data['value_4'] = $this->projectDetails_m->getOpenTestsuites($aaa);
                
                 $this->data['value_5'] = $this->projectDetails_m->getClosedTestsuites($aaa);                    
                
                $this->data['subview'] = 'admin/user/projectDetails_v';
                $this->load->view('admin/_layout_main',$this->data);
	}
        
		public function modal(){
			$this->load->view("admin/_layout_modal",$this->data);
		}
                

	}


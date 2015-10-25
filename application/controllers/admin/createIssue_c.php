<?php
        /*
         * Author : Binalie
         * Type : class
         * Name : projectLoader_c
         * Description : This class handle all the projects related activities
         */
	class createIssue_c extends Admin_Controller
        {
		/*
		 * Author : Binalie
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of projectLoader_c class
		 */
		public function __construct()
        {
            parent::__construct();                        
            $this->load->model("createIssue_m");                    
		}

        /*
		 * Author : Binalie
		 * Type : method
		 * Name : index
		 * Description : This function route to the sub view
		 */
                
        public function index()
        {                    
        	$this->load->library('form_validation');
        	echo "Binalie Ravinga Liyanage";
            
            $this->data['versions'] = $this->createIssue_m->loadVersions();
            $this->data['subview'] = 'admin/user/createIssue_v';
            $this->load->view('admin/_layout_main',$this->data);

		}
                
		public function modal()
        {
			$this->load->view("admin/_layout_modal",$this->data);
		}              

		public function createIssue(){
			$dashboard = '';//controller path

		$this->createIssue_m->rules = array(
				'txtSummary' => array('field'=>'summary',
								'label'=>'Summary',
								'rules'=>'trim|required'
								),
				);

			$rules = $this->createIssue_m->rules;
			
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run($rules) == TRUE) {
				$id = $this->createIssue_m->createIssue("versions","version_id");
					redirect("admin/users/thankyou_c");
			}

			// $this->data['subview'] = 'admin/user/addNewUsers';
			// $this->load->view('admin/_layout_main',$this->data);
		}
	}


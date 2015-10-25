<?php 

/*
 * Author : Binalie
 * Type : class
 * Name : closedTestcases_c
 * Description : This class handle all the user closed Testcases related activities
 */
class closedTestcases_c extends Admin_Controller 
{

        /*
         * Auther : Binalie
         * Type : Constructor
         * Name : __construct
         * Description : this is the default construtor of closedTestcases_c class
         */
        public function __construct()
        {
               parent::__construct();
               $this->load->model('closedTestcases_m');
        }
    
	/*
         * Author : Binalie
         * Type : method
         * Name : index
         * Description : This function route to the sub view
         */       
        public function index()
	{
             $aaa=$_GET['var'];

             $this->load->model('closedTestcases_m');

            $this->data['value_1'] = $this->closedTestcases_m->viewClosedTestcases($aaa);

            $this->data['subview'] = 'admin/user/closedTestcases_v';

            $this->load->view('admin/_layout_main',$this->data);
	}        
        
}
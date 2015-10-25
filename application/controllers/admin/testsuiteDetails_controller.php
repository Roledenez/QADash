<?php 
/*
 * Author : Binalie
 * Type : class
 * Name : testsuiteDetails_controller
 * Description : This class handle all the Testsuite related activities
 */
class testsuiteDetails_controller extends Admin_Controller 
{

        /*
         * Author : Binalie
         * Type : Constructor
         * Name : __construct
         * Description : this is the default construtor of testsuiteDetails_controller class
         */
        public function __construct()
        {
                parent::__construct();
               $this->load->model('testsuiteDetails_model');
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

		$this->data['value_1'] = $this->testsuiteDetails_model->getTestsuitesDetails($aaa);
                
                $this->data['value_2'] = $this->testsuiteDetails_model->getClosedTestcases($aaa);
                
                $this->data['value_3'] = $this->testsuiteDetails_model->getOpenTestcases($aaa);
		    
                $this->data['subview'] = 'admin/user/testsuiteDetails_view';
                
                $this->load->view('admin/_layout_main',$this->data);
	}
}



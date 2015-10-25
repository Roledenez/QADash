<?php 
/*
 * Author : Binalie
 * Type : class
 * Name : closedTestsuites_controller
 * Description : This class handle all the closed testsuites related activities
 */
class closedTestsuites_controller extends Admin_Controller
{

        /*
         * Author : Binalie
         * Type : Constructor
         * Name : __construct
         * Description : this is the default construtor of closedTestsuites_controller class
         */
        public function __construct()
        {
            parent::__construct();
            $this->load->model('closedTestsuites_model');
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

            $this->data['value_1'] = $this->closedTestsuites_model->getAllClosedTestsuitesDetails($aaa);

            $this->data['subview'] = 'admin/user/closedTestsuites_view';

            $this->load->view('admin/_layout_main',$this->data);
	}
}


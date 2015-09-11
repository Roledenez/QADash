<?php 
class closedTestsuites_controller extends Admin_Controller {

        public function __construct(){
			parent::__construct();
                       $this->load->model('closedTestsuites_model');
		}
    
	public function index()
	{
                $aaa=$_GET['var'];

		$this->data['value_1'] = $this->closedTestsuites_model->getAllClosedTestsuitesDetails($aaa);
		    
                $this->data['subview'] = 'admin/user/closedTestsuites_view';
                
                $this->load->view('admin/_layout_main',$this->data);
	}
}


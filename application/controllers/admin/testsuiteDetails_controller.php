<?php 
class testsuiteDetails_controller extends Admin_Controller {

        public function __construct(){
			parent::__construct();
                       $this->load->model('testsuiteDetails_model');
		}
    
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



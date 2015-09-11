<?php 
class closedTestcases_c extends Admin_Controller {

        public function __construct(){
			parent::__construct();
                       $this->load->model('closedTestcases_m');
		}
    
	       
        public function index()
	{
                 $aaa=$_GET['var'];

                 $this->load->model('closedTestcases_m');
                
		$this->data['value_1'] = $this->closedTestcases_m->viewClosedTestcases($aaa);
                               
                $this->data['subview'] = 'admin/user/closedTestcases_v';
                
                $this->load->view('admin/_layout_main',$this->data);

	}        
        
}
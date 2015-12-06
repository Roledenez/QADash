<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Project
 * @deprecated Method deprecated in Release 2.0.0
 * Description : This class handle all the project related activities
 */
class Project extends Engineer_Controller
{
	/**
	 * @author : Roledene
	 * Type : Constructor
	 * Name : __construct
	 * Description : this is the default construtor of project class
	 */
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * @author : Roledene
	 * Type : method
	 * Name : getProjects
	 * @deprecated Method deprecated in Release 2.0.0
	 * Description : this method use for testing purpose
	 */
    public function getProjects()
    {
        echo $this->project_m->getProjectsByUser('Hot Bug Fix');
    }

	/**
	 * @author : Roledene
	 * Type : method
	 * Name : testForm
	 * @deprecated Method deprecated in Release 2.0.0
	 * Description : this method use for testing purpose
	 */
    public function testForm()
    {
        $this->session->set_userdata(array('project_id' => $this->input->post('projectId')));
        
        $path = '';
			// get the user role in session
			$role = $this->session->userdata('role');
			if (isset($role)) {
			switch ($role) {
						case 'admin':
							$path = site_url("admin/base_controller/loadView"); //'admin/base_controller/loadView';
							break;
						case 'manager':
							$path = site_url("manager/base_controller/loadView");//'manager/base_controller/loadView';
							break;
						case 'engineer':
							$path = site_url("engineer/base_controller/loadView");//'engineer/base_controller/loadView';
							break;
						case 'intern':
							$path = site_url("engineer/dashboard");//'engineer/dashboard';
							break;

						default:
							# code...
							break;
					}
//					return $path;
//			}else{
//				return null;
			}
        
        redirect($path);
        //redirect("engineer/assignedToMe_controller");
        //echo $this->input->post('projectId');
    }

	/**
	 * @author : Roledene
	 * Type : method
	 * Name : testProjectSession
	 * @deprecated Method deprecated in Release 2.0.0
	 * Description : this method use for testing purpose
	 */
    public function testProjectSession()
    {
        echo $this->session->userdata('project_id');
    }

}
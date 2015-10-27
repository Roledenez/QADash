<?php
		
	class createIssue_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}        

        // public $rules = array(                
        //         'txtSummary' => array('field'=>'summary',
        //                               'label'=>'Summary',
        //                               'rules'=>'trim|required'
        //                                 ),              

        //         'txtIssueCode' => array('field'=>'issue_code',
        //                                 'label'=>'Issue Code',
        //                                 'rules'=>'trim|required'
        //                                 )
        //     );

        // public function createIssue($tableName,$primaryKey){

        //     $this->user_m->_table_name = $tableName;
        //     $this->user_m->_primary_key = $primaryKey;

        //     echo "I'm here!";

        //     $id = $this->save(array(
        //         'issue_code' => $this->input->post('issue_code'),
        //         'issue_type' => $this->input->post('issue_type'),
        //         'priority_type' => $this->input->post('priority'),
        //         'summary' => $this->input->post('summary')                
        //         ));
        //     return $id;
        // }

        public function createIssue($data)
        {
            echo 'Blah blah blah';
            $this->db->insert('issue',$data);
        }

        
        public function loadVersions()
        {
            $sql = "SELECT version_code FROM versions WHERE project_id = 1";
            return $this->db->query($sql)->result();
        }
    }

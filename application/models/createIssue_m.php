<?php
		
	class createIssue_m extends My_Model
    {        
		public function __construct()
        {
			parent::__construct();            
                       
		}               


        public $rules = array(
                
                'txtSummary' => array('field'=>'issue_type',
                                    'label'=>'Issue Type',
                                    'rules'=>'trim|required'
                                    )
            );

        public function createIssue($tableName,$primaryKey){

            $this->user_m->_table_name = $tableName;
            $this->user_m->_primary_key = $primaryKey;

            $id = $this->save(array(
                'issue_code' => $this->input->post('summary'),
                'project_id' => $this->input->post('issue_code'),
                'priority_type' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'password' => $this->hash($this->input->post('password'))
                ));
            return $id;
        }

        
        public function loadVersions()
        {
            $sql = "SELECT version_code FROM versions WHERE project_id = 1";
            return $this->db->query($sql)->result();
        }

        public function dataInsertion($data)
        {
            $this->db->insert('students', $data);
        }

    }

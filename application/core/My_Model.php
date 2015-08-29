<?php
		/*
		 * Auther : Roledene
		 * Type : class
		 * Name : My_Model
		 * Description : This class handle all database operation, eg: CRUD operations
		 */
	class My_Model extends CI_Model {

		//table name, this can be vary
		protected $_table_name = "";
		// primary key of the table, default is "id", this can be vary
		protected $_primary_key = "id";
		// I cant remember this filter, find this in google
		protected $_primary_filter = "intval";
		//order by clouse, this can be vary, defaut is not set
		protected $_order_by = "";
		//rules array use to valied the form input
		public $_rules = array();
		//if timestamps true, it add the time and date to the tuple that we goind to add, this helps to log the db update times
		protected $_timestamps = FALSE;

		/*
		 * Auther : Roledene
		 * Type : Constructor
		 * Name : __construct
		 * Description : this is the default construtor of User class
		 */
		function __construct(){
			parent::__construct();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : get
		 * param1 : id  //primary key
		 * param2 : single //returns the set of tuples or single tuple
		 * Description : This method return a single row or set of rows based on "id" paramiter value
		 */
		public function get($id = NULL, $single = FALSE){
			// if id is not null return the tuple that corresponding to the id
			if($id != NULL){
				$filter = $this->_primary_filter;
				$id = $filter($id);
				$this->db->where($this->_primary_key,$id);
				$method = "row";
			}elseif($single == TRUE){ // if single is true return the first tuple
				$method =  "row";
			}else{ // else return all the result
				$method =  "result";
			}
			// if(!count($this->db->qb_orderby)){
				$this->db->order_by($this->_order_by);
			// }
			return $this->db->get($this->_table_name)->$method();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : get_by
		 * Description : This method return a single row or set of rows based on "$where" paramiter value, it filter the value by where clouse
		 */
		public function get_by($where, $single =  FALSE){
			$this->db->where($where);
			return $this->get(NULL,$single);
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : save
		 * Description : This method insert a value to the table
		 */
		public function save($data,$id = NULL){
			// set timestamps
			if($this->_timestamps == TRUE){ // if timestamps true, set the timestamps
				$now = date('Y-m-d H:i:s');
				$id || $date["created"] = $now;
				$data["modified"] = $now;
			}
			// insert
			if($id === NULL){ // if id is null then it is an insert, otherwise it is an update
				!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL; // check the primary key is set
				$this->db->set($data);
				$this->db->insert($this->_table_name);
				$id = $this->db->insert_id();
			}
			//update
			else{
				$filter = $this->_primary_key;
				// $id = $filter($id);
				$this->db->set($data);
				$this->db->where($this->_primary_key,$id);
				$this->db->update($this->_table_name);
			}

			return $id; // return the primary key
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : delete
		 * Description : This method delete a tuple in table
		 */
		public function delete($id){
			$filter = $this->_primary_key;
			// $id = $filter($id);
			if (!$id) {
				return FALSE;
			}
			$this->db->where($this->_primary_key,$id);
			$this->db->limit(1);
			$this->db->delete($this->_table_name);
		}
	}
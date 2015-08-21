<?php
/*
 * Auther : Roledene
 * Type : class
 * Name : Project_m
 * Description : this class represent the project table in db and it's functionality
 */
	class Project_m extends My_Model{
		// table name of the database
		protected $_table_name = "project";
		// order by clouse
		protected $_order_by = "";
		protected $_timestamps = FALSE;
		// output data holder
		public $data = array();
		// constructor
		public function __construct(){
			parent::__construct();
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : getAllProjects
		 * Description : this method return all the project tuples in project table
		 */
		public function getAllProjects(){
			$project = $this->get();
			if (count($project)) {// if project found
			// var_dump($project);
				$data = null;
				$i = 0;
				while (count($project)>$i) {
				$data[$i]  = array(
					'pid' => $project[$i]->project_id,
					'name' => $project[$i]->name,
					'description' => $project[$i]->description,
					'startingDate' => $project[$i]->starting_date,
					'endingDate' => $project[$i]->ending_date,
					'status' => $project[$i]->status,
					'prorityId' => $project[$i]->prority_id
					);
				$i++;
				}
				return $data;
			}else{ // if there wasn't any projects
				#TODO
				#print an error message
				return null;
			}
		}

		/*
		 * Auther : Roledene
		 * Type : method
		 * Name : getFinishedProjects
		 * Description : this method return all the project tuples in project table
		 */
		public function getFinishedProjects(){
			$project = $this->get();
			if (count($project)) {// if project found
			// var_dump($project);
				$data = null;
				$i = 0;
				while (count($project)>$i) {
				$data[$i]  = array(
					'pid' => $project[$i]->project_id,
					'name' => $project[$i]->name,
					'description' => $project[$i]->description,
					'startingDate' => $project[$i]->starting_date,
					'endingDate' => $project[$i]->ending_date,
					'status' => $project[$i]->status,
					'prorityId' => $project[$i]->prority_id
					);
				$i++;
				}
				return $data;
			}else{ // if there wasn't any projects
				#TODO
				#print an error message
				return null;
			}
		}

	}


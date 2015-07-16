<?php
	class Page extends Frontend_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model("page_m");
		}

		public function index(){
			$pages = $this->page_m->get(2);
			var_dump($pages);
		}

		public function save(){
			$data = array(
					"name" => "insert from php",
					"description" => "my insert",
					"starting_date" => "2015-07-07",
					"ending_date" => "2015-07-07",
					"status" => "inprogress",
				);
			$id = $this->page_m->save($data, 3);
			var_dump($id);
		}

		public function delete(){
			 $this->page_m->delete(3);

		}
	}
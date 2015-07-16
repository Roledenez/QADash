<?php
	class Page_m extends My_Model{
		protected $_table_name = "projects";
		protected $_primary_key = "id";
		protected $_primary_filter = "intval";
		protected $_order_by = "";
		protected $_rules = array();
		protected $_timestamps = FALSE;
	}
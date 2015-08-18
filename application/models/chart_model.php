<?php

//if (!defined('BASEPATH'))
//    exit('No direct script access allowed');

//class Chart_model extends CI_Model {
class Chart_model extends My_Model {    

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_data() {
        $this->db->select('pname, failedTC, passedTC');
        $this->db->from('charts');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_barchartdata() {
        $this->db->select('Pname, issues, testcases');
        $this->db->from('charts');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_piechartdata() {
        $this->db->select('COUNT(member_id), project_id');
        $this->db->from('project_member');
        $this->db->group_by("project_id"); 
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_columnchartdata() {
        $this->db->select('Pname, totalhours, spentours');
        $this->db->from('charts');
        $query = $this->db->get();

        return $query->result();
    }
    
//    select COUNT(member_id), project_id FROM project_member GROUP BY project_id

}
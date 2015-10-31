<?php

/**
 * Type : class
 * Name : Report_m
 * Description : this class represent the report table in db and it's functionality
 */
class Report_m extends My_Model
{

    /**
     * Type : method
     * Name : getReportListByUser
     * Description : this method return all the reports that are generated by the user
     */

    public function getReportListByUser()
    {
        try {
            $this->db->select('r.report_name,r.report_url');
            $this->db->from('reports AS r');
            $this->db->where('r.uid = ' . $this->session->userdata('uid'));

            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


    /**
     * @param $reportName report name to be deleted
     * @return boolean TRUE - If delete success or else will return FALSE
     */
    public function deleteReportByUser($reportName)
    {
        try {
            return $this->db->delete('reports', array('uid' => $this->session->userdata('uid'),'report_name'=>$reportName));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function saveReport($data){
        try {
            return $this->db->insert('reports',$data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


}
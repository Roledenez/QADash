<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 11:33 AM
 */
class Notification_m extends My_Model implements AbstractSubject
{

    protected $_table_name = "notifications";
    // rules for the login imput fields
    protected $_order_by = "";
    protected $_primary_key = "userId";
    protected $_timestamps = FALSE;

    private $favoritePatterns = NULL;
    private $observers = array();

    /*
     * Author : Roledene JKS
     * Type : constructor
     * Name : __construct
     * Description : Default construtor for Notification_m class
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function attach(AbstractObserver $observer_in)
    {
        //could also use array_push($this->observers, $observer_in);
        $this->observers[] = $observer_in;
    }

    public function detach(AbstractObserver $observer_in)
    {
        //$key = array_search($observer_in, $this->observers);
        foreach ($this->observers as $okey => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$okey]);
            }
        }
    }

    function insertNotification($userId, $projectId, $title, $notification, $status, $navUrl)
    {
        $id = $this->save(array(
            'userId' => $userId,
            'projectId' => $projectId,
            'title' => $title,
            'notification' => $notification,
            'status' => $status,
            'navigate_url' => $navUrl
        ));
        $this->notify();
//        return $id;
    }

    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    function getUnreadNotifications()
    {
        try {
            $this->db->select('*');
            $this->db->from('notifications');
            $this->db->where('read=0 and userId=' . $this->session->userdata('uid'));
            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getAllNotificationsByUser()
    {
        try {
            $this->db->select('*');
            $this->db->from('notifications');
            $this->db->where('userId=' . $this->session->userdata('uid'));
            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function readNotification()
    {
        $id = $this->save(array(
            'read' => 1
        ), $this->session->userdata('uid'));
    }

    function getAllNotificationsByProject($projectId)
    {
        try {
            $this->db->select('*');
            $this->db->from('notifications');
            $this->db->where('userId=' . $this->session->userdata('uid') . ' AND projectId=' . $projectId);
            $query = $this->db->get()->result();
            return json_encode($query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


}
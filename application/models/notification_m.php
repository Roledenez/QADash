<?php

/**
 * @author : Roledene
 * Type : class
 * Name : Notification_m
 * implements by AbstractSubject which is in observer pattern
 * Description : This class represent the Notification model
 */
class Notification_m extends My_Model implements AbstractSubject
{
    /**
     * @var string
     * @access protected
     */
    protected $_table_name = "notifications";
    /**
     * @var string
     * @access protected
     */
    protected $_order_by = "";
    /**
     * @var string
     * @access protected
     */
    protected $_primary_key = "id";
    /**
     * @var bool
     * @access protected
     */
    protected $_timestamps = FALSE;
    /**
     * @var string
     * @access private
     */
    private $favoritePatterns = NULL;
    /**
     * @var string array
     * @access private
     */
    private $observers = array();

    /**
     * @author : Roledene
     * Type : constructor
     * Name : __construct
     * Description : Default constructor for Notification_m class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @author : Roledene
     * Type : abstract method
     * Name : attach
     * @param AbstractObserver $observer_in
     * Description : This method attach a user as a observer for notification
     */
    public function attach(AbstractObserver $observer_in)
    {
        //could also use array_push($this->observers, $observer_in);
        $this->observers[] = $observer_in;
    }

    /**
     * @author : Roledene
     * Type : abstract method
     * Name : detach
     * @param AbstractObserver $observer_in
     * Description : This method detach a user as a observer for notification
     */
    public function detach(AbstractObserver $observer_in)
    {
        //$key = array_search($observer_in, $this->observers);
        foreach ($this->observers as $okey => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$okey]);
            }
        }
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : insertNotification
     * @param int $userId
     * @param int $projectId
     * @param string $title
     * @param string $notification
     * @param string $status
     * @param string $navUrl
     * Description : This method insert a notification data to database
     */
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

    /**
     * @author : Roledene
     * Type : method
     * Name : notify
     * Description : This method notify to all the observes
     */
    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getUnreadNotifications
     * @return string sql query as json
     * Description : This method return the unread notifications
     */
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

    /**
     * @author : Roledene
     * Type : method
     * Name : getAllNotificationsByUser
     * @return string sql query as json
     * Description : This method return the unread all notifications by user
     */
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

    /**
     * @author : Roledene
     * Type : method
     * Name : readNotification
     * Description : This method update the notification as read
     */
    function readNotification()
    {
        $id = $this->save(array(
            'read' => 1
        ), $this->session->userdata('uid'));
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getAllNotificationsByProject
     * @param int $projectId
     * @return string sql query as json
     * Description : This method return the unread all notifications by project
     */
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
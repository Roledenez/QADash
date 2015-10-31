<?php

/***
 * @author : Roledene
 * Type : class
 * Name : Notification
 * Description : This class handle all the Notification related activities
 */
class Notification extends Engineer_Controller
{
    /**
     * @author : Roledene
     * Type : Constructor
     * Name : __construct
     * Description : this is the default construtor of User class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : index
     * @deprecated Method deprecated since iteration 3
     * Description : this method use for testing purpose
     */
    public function index()
    {
//        echo 'index()';
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : setNotification
     * Description : this function add a notification to database
     */
    public function setNotification()
    {
        $nSubject = new Notification_m();
        $nSubject->insertNotification($this->session->userdata('uid'), 1, "new modification", "Has been done", "created", site_url() . "engineer/notification/getUnreadNotifications");
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getUnreadNotifications
     * Description : this function print the loggedin user's unread notification count in plan html page in json format
     */
    public function getUnreadNotifications()
    {
        $notification = new Notification_m();
        echo $notification->getUnreadNotifications();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getAllNotificationsByUser
     * Description : this function print the loggedin user's all notification count in plan html page in json format
     */
    public function getAllNotificationsByUser()
    {
        $notification = new Notification_m();
        echo $notification->getAllNotificationsByUser();
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : gotoActiveStream
     * Description : this function redirect the user to active stream UI
     */
    public function gotoActiveStream()
    {
        $this->data['subview'] = 'engineer/user/activeStream_view';
//        $this->data['users'] = $users;
        $this->load->view('engineer/_layout_main', $this->data);
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : getAllNotificationsByProject
     * Description : this function print the all notification count in plan html page in json format by project
     */
    public function getAllNotificationsByProject()
    {
        $notification = new Notification_m();
        echo $notification->getAllNotificationsByProject(1);
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : gotoProjectActiveStream
     * Description : this function redirect to the project active stream UI
     */
    public function gotoProjectActiveStream()
    {
        $this->data['subview'] = 'engineer/user/ProjectActiveStream_view';
//        $this->data['users'] = $users;
        $this->load->view('engineer/_layout_main', $this->data);
    }

    /**
     * @author : Roledene
     * Type : method
     * Name : readNotification
     * Description : this function update the notification as readed
     */
    public function readNotification()
    {
        $notification = new Notification_m();
        echo $notification->readNotification();
    }
}
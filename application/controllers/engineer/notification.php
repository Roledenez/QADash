<?php

/**
 * Created by IntelliJ IDEA.
 * User: Roledene JKS
 * Date: 10/25/2015
 * Time: 9:55 AM
 */
class Notification extends Engineer_Controller
{


    /*
     * Auther : Roledene
     * Type : Constructor
     * Name : __construct
     * Description : this is the default construtor of User class
     */
    public function __construct()
    {

        parent::__construct();

    }

    public function index()
    {
        echo 'index()';
    }

    public function setNotification()
    {

        $nSubject = new Notification_m();
        $nSubject->insertNotification(1, "testNofiyTitle", "this is a test nofiticaion", "created", site_url() . "engineer/notification/getUnreadNotifications");

    }

    public function getUnreadNotifications()
    {
        $notification = new Notification_m();
        echo $notification->getUnreadNotifications();
    }


    public function getAllNotificationsByUser()
    {
        $notification = new Notification_m();
        echo $notification->getAllNotificationsByUser();
    }

    public function gotoActiveStream()
    {
        $this->data['subview'] = 'engineer/user/activeStream_view';
//        $this->data['users'] = $users;
        $this->load->view('engineer/_layout_main', $this->data);
    }

    public function getAllNotificationsByProject()
    {
        $notification = new Notification_m();
        echo $notification->getAllNotificationsByProject(1);
    }

    public function gotoProjectActiveStream()
    {
        $this->data['subview'] = 'engineer/user/ProjectActiveStream_view';
//        $this->data['users'] = $users;
        $this->load->view('engineer/_layout_main', $this->data);
    }

    public function readNotification()
    {
        $notification = new Notification_m();
        echo $notification->readNotification();
    }
}
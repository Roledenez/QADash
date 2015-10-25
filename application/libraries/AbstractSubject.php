<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 10:15 AM
 */
interface AbstractSubject
{

    public function attach(AbstractObserver $observer_in);

    public function detach(AbstractObserver $observer_in);

    public function notify();

}
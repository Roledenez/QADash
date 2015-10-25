<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 10:14 AM
 */
interface AbstractObserver
{
    public function update(AbstractSubject $subject_in);
}
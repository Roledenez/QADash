<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 10:02 AM
 */
class PatternObserver implements AbstractObserver
{

    public function __construct()
    {
        //TODO implement the constructor
    }

    public function update(AbstractSubject $subject_in)
    {
//        $this->writeln('*----IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*');
//        $this->writeln(' new favorite patterns: '.$subject_in->getFavorites());
//        $this->writeln('*---IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*');
        echo 'notified me!<br />';
    }


    function writeln($line_in)
    {
        echo $line_in . "<br/>";
    }
}
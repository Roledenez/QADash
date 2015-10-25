<?php

/**
 * Created by IntelliJ IDEA.
 * User: srole_000
 * Date: 10/25/2015
 * Time: 10:19 AM
 */
class PatternSubject implements AbstractSubject
{

    private $favoritePatterns = NULL;
    private $observers = array();

    function __construct()
    {
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

    function updateFavorites($newFavorites)
    {
        $this->favorites = $newFavorites;
        $this->notify();
    }

    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    function getFavorites()
    {
        return $this->favorites;
    }
}
<?php

interface AbstractObserver
{
    public function update(AbstractSubject $subject_in);
}

interface  AbstractSubject
{
    public function attach(AbstractObserver $observer_in);

    public function detach(AbstractObserver $observer_in);

    public function notify();
}

function writeln($line_in) {
    echo $line_in."<br/>";
}

class PatternObserver implements AbstractObserver
{
    public function __construct() {
    }
    public function update(AbstractSubject $subject) {
        writeln('*----IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*');
      writeln(' new favorite patterns: '.$subject->getFavorites());
        writeln('*---IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*');
    }
}

class PatternSubject implements AbstractSubject
{
    private $favoritePatterns = NULL;
    private $observers = array();
    function __construct() {
    }
    function attach(AbstractObserver $observer_in) {
      //could also use array_push($this->observers, $observer_in);
      $this->observers[] = $observer_in;
    }
    function detach(AbstractObserver $observer_in) {
      //$key = array_search($observer_in, $this->observers);
      foreach($this->observers as $okey => $oval) {
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

    function notify() {
      foreach($this->observers as $obs) {
        $obs->update($this);
      }
    }

    function getFavorites() {
      return $this->favorites;
    }
}

  writeln('BEGIN TESTING OBSERVER PATTERN');
  writeln('');

  $patternGossiper = new PatternSubject();
  $patternGossipFan = new PatternObserver();
$patternGossip = new PatternObserver();
  $patternGossiper->attach($patternGossipFan);
$patternGossiper->attach($patternGossip);
  $patternGossiper->updateFavorites('abstract factory, decorator, visitor');
  $patternGossiper->updateFavorites('abstract factory, observer, decorator');
  $patternGossiper->detach($patternGossipFan);
  $patternGossiper->updateFavorites('abstract factory, observer, paisley');

  writeln('END TESTING OBSERVER PATTERN');

?>
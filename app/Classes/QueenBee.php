<?php

/**
 * Description of QueenBee
 *
 * @author rabie
 */

class QueenBee extends Bee implements \SplSubject{
    /**
     * @var SplObjectStorage  
     */
    private $_observers;
    public function __construct() {
        $this->_observers = new SplObjectStorage();
        $this->_life = 100;
        $this->_damage = 8;
        $this->_name = 'QueenBee';
    }
    public function hit() {
        parent::hit();
        if(!$this->isAlive()){
            $this->notify();
        }
    }

    /**
     * sudden death
     */
    public function dieNow() {
        return ;
    }

    public function attach(\SplObserver $observer) {
        $this->_observers->attach($observer);
    }

    public function detach(\SplObserver $observer) {
        $this->_observers->detach($observer);

    }

    public function notify() {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }        
    }

}

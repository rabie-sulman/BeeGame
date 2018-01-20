<?php

/**
 * Description of DroneBee
 *
 * @author rabie
 */
class WorkerBee extends Bee implements \SplObserver{
    public function __construct() {
        $this->_life = 75;
        $this->_damage = 10;
        $this->_name = 'WorkerBee';
    }

    public function update(\SplSubject $subject) {
        if(!$subject->isAlive()){
            $this->dieNow();
        }
    }
}

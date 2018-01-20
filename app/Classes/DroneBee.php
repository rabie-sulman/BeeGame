<?php

/**
 * Description of DroneBee
 *
 * @author rabie
 */
class DroneBee extends Bee implements \SplObserver{
    public function __construct() {
        $this->_life = 50;
        $this->_damage = 12;
        $this->_name = 'DroneBee';
    }

    public function update(\SplSubject $subject) {
        if(!$subject->isAlive()){
            $this->dieNow();
        }
    }

}

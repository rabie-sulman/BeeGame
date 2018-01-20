<?php

/**
 * Description of Bee
 *
 * @author rabie
 */

abstract Class Bee {
    protected $_life;
    protected $_damage;
    protected $_name;
    /**
     *  cause damage
     *      */
    public function hit(){
        $this->_life = $this->_life-$this->_damage;
    }
    /**
     *  is the bee alive or dead?
     *      */
    public function isAlive(){
        if($this->_life<=0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    /**
     * sudden death
     */
    public function dieNow() {
        $this->_life = 0;
    }    
    /**
     *      get name
     */
    public function getName(){
        return $this->_name;
    }
    /**
     * return what is left of its life
     */
    public function getLife(){
        return $this->_life;
    }
}
    

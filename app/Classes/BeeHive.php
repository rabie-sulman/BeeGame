<?php

/**
 * Container class
 */
Class BeeHive implements \SplObserver
{
    protected $_gameOver = FALSE;
    protected $_beeHiveOccupants = array();
    
    public function __construct()
    {
        $this->buildHive();
        
    }
    protected function buildHive()
    {
        $normalBeeTypes = array("WorkerBee","DroneBee");
        $queenBee= BeeFactory::build("QueenBee");
        $this->_beeHiveOccupants[] = $queenBee;
        foreach ($normalBeeTypes as $beeType)
        while (true){
            $bee= BeeFactory::build($beeType);
            if(!is_null($bee)){
                $queenBee->attach($bee);
                $this->_beeHiveOccupants[] = $bee;
            }else{
                break;
            }
        }
        // notify the BeeHive that the queen is dead by making the Hive an observer
        $queenBee->attach($this);
    }

    public function gameOver()
    {
        return $this->_gameOver;
    }

    public function update(\SplSubject $subject) 
    {
        if(!$subject->isAlive()){
            $this->_gameOver = TRUE;   
        }
    }
    public function getAllBees()
    {
        return $this->_beeHiveOccupants;
    }
    
    public function randomHit()
    {
        // random number between 0 and the number of bees left in the hive
        $rand = mt_rand(0, count($this->_beeHiveOccupants)-1);
        $this->_beeHiveOccupants[$rand]->hit();
        if(!$this->_beeHiveOccupants[$rand]->isAlive()){
            unset($this->_beeHiveOccupants[$rand]);
            // rearrange bug
            $this->_beeHiveOccupants = array_values($this->_beeHiveOccupants);
        }
       
    }

}


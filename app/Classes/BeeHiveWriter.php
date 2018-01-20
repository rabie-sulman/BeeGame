<?php

/**
 * Description of BeeHiveWriter
 *
 * @author rabie 
 */
class BeeHiveWriter {
    protected $_hiveName ;
    public function __construct($hiveName= 'hive') {
        $this->_hiveName = $hiveName;
    }

    public function writeSession(BeeHive $beeHive){
        $_SESSION["$this->_hiveName"] = serialize($beeHive);
    }
    
    public function deleteSession (){
        unset($_SESSION["$this->_hiveName"]);
    }
}

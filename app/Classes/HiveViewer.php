<?php

/**
 * Description of HiveViewer
 *
 * @author rabie
 */
class HiveViewer {

    private $_hive;
    public function __construct(BeeHive $hive) {
        $this->_hive = $hive;
    }
    public function view(){
        $returnedString = "";
        $bees = $this->_hive->getAllBees();
        foreach ($bees as $bee ) {
            $returnedString .= "<br>".$bee->getName()." has ".$bee->getLife()." hit points remaining";
        }
        return $returnedString;
    }
    
    
}

<?php

/**
 * Description of BeeFactory
 *
 * @author rabie
 */
class BeeFactory {
    static private $_limits = array(
        "QueenBee"=>1,
        "WorkerBee"=>5,
        "DroneBee"=>8
    );
    public static function build($type){
        if (self::$_limits[$type]>0){
            self::$_limits[$type] = self::$_limits[$type] -1;
            return new $type;
        }else{
            return;
        }
    }
}

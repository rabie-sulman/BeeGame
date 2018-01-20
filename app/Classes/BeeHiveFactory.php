<?php

/**
 * Description of BeeHiveFactory:
 * either create a new hive or retirve it from teh session
 *
 * @author rabie
 */
class BeeHiveFactory {
    public static function build($hiveName){
        if(!isset($_SESSION["$hiveName"]) ){
            return new BeeHive();
        }else{
            return unserialize($_SESSION["$hiveName"]);
        }
    }
}

<?php

/**
 * Description of GameBee
 *
 * @author rabie
 */
class GameBee {
    private static $_hiveName = '';
    private static $_gameStatus = '';
    private static $_hiveStatus = '';
    private static $_hive;
    private static $_hiveViewer;
    static function hit(){
        // init a hive writer for saving the object
        $beeHiveWriter = new BeeHiveWriter(self::$_hiveName);
        // if game is not over, random hit a bee
        if(!self::$_hive->gameOver()){
            self::$_hive->randomHit();
        }
        // after the hit, if game over: delete session
        if(self::$_hive->gameOver()){
            self::$_gameStatus = "game over";
            $beeHiveWriter->deleteSession();
        }else{
        // if game is not over, write the session
            self::$_gameStatus= "game on";
            $beeHiveWriter->writeSession(self::$_hive);
        };
        // update status
        self::$_hiveStatus = self::$_hiveViewer->view();
    }
    static function init($hiveName = 'hive'){
        // build or retrive the hive
        self::$_hive = BeeHiveFactory::build($hiveName);
        self::$_hiveName = $hiveName;
        // init a viewer to view the hive
        self::$_hiveViewer = new HiveViewer(self::$_hive);
    // update status
        self::$_hiveStatus = self::$_hiveViewer->view();        
    }

    /**
     * @return String is it game over or not
     */
    static function getStatus(){
        return self::$_gameStatus;
    }
    /**
     * @return String situation of the bees in the hive
     */    
    static function getHiveStatus(){
        return self::$_hiveStatus;
    }
}

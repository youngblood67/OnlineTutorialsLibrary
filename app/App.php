<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 12:00
 */

namespace App;

class App
{
    private static $_database;
    private static $_instance;



    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function getDatabase()
    {
        if (self::$_database === null) {
            self::$_database = new Database(Config::getInstance()->get('db_name'), Config::getInstance()->get('db_user'), Config::getInstance()->get('db_pass'), Config::getInstance()->get('db_host'));
        }
        return self::$_database;
    }

}
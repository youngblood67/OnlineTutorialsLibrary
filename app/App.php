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

    private static $_instance;



    public static function getInstance(){

        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }



}
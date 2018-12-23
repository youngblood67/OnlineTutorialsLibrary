<?php

/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 23/12/2018
 * Time: 16:30
 */

namespace App;

class Autoloader
{
    static function autoload($className)
    {
        if (strpos($className, __NAMESPACE__ . '\\') === 0) {
            $className = str_replace(__NAMESPACE__ . '\\', '', $className);
            //var_dump($className);
            require __DIR__ . "/" . $className . ".php";
        }
    }

    static function register()
    {

        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

}
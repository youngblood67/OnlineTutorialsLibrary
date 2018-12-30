<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 22:05
 */

namespace App\Tables;


use App\App;

class Theme
{
    private static $table = "theme";

    public static function getAll(){
        return App::getDatabase()->query("SELECT * FROM ".self::$table,__CLASS__);
    }
}
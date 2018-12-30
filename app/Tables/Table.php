<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 22:45
 */

namespace App\Tables;

use App\App;

class Table
{
    protected static $table;

    private static function getTable(){
        if(self::$table === null){
            self::$table = get_called_class();
            self::$table = strtolower(explode("\\",self::$table)[2]);
        }
        return self::$table;
    }

    public static function getAll()
    {
        return App::getDatabase()->query("SELECT * FROM " . self::getTable(), __CLASS__);
    }
}
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
    protected static $_table;

    public static function getAll()
    {

        return App::getDatabase()->query("SELECT * FROM " . static::$_table, get_called_class());
    }
}
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

    /**
     * Dans le cas où le nom de la table n'est pas défini dans la classe enfant alors le nom de la table est créé à partir du nom de la classe enfant
     *
     * @return string le nom de la table
     */
    private static function getTable()
    {
        if (static::$table === null) {
            static::$table = get_called_class();
            static::$table = strtolower(explode("\\", static::$table)[2]);
        }
        return static::$table;
    }

    public static function getAll()
    {

        return App::getDatabase()->query("SELECT * FROM " . static::getTable(), get_called_class());
    }
}
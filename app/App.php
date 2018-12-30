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
    const DB_NAME = "db_tutos_videos";
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';


    private static $database;

    public static function getDatabase()
    {
        if (self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }
}
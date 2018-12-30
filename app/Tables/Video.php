<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 09:52
 */

namespace App\Tables;

use App\App;

class Video extends Table
{
    protected static $table = "video";

    public static function getLast($nb = 5){
        return App::getDatabase()->query("SELECT * FROM ".self::$table." ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

}
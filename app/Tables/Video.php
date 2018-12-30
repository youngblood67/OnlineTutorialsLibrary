<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 09:52
 */

namespace App\Tables;

use App\App;

class Video
{
    private static $table = "video";

    public static function getLast($nb = 5){
        return App::getDatabase()->query("SELECT * FROM ".self::$table." ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
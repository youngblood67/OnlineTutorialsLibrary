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
    protected static $_table = "video";

    public static function getLast($nb = 100)
    {
        return App::getDatabase()->query("SELECT * FROM ".self::$_table." ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

    public static function getLastByTheme($idTheme = 1,$nb = 100)
    {
        return App::getDatabase()->query("
            SELECT v.title as vidTitle, v.url as url
            FROM ".self::$_table." v, video_theme vt, theme t
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND t.idTheme = {$idTheme}
            ORDER BY v.idVideo DESC
            LIMIT {$nb}
        ",__CLASS__);
    }
}
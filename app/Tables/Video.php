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

    public static function getLast($nb = 100)
    {
        return App::getDatabase()->query("SELECT * FROM video ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

    public static function getLastByTheme($idTheme = 1,$nb = 100)
    {
        return App::getDatabase()->query("
            SELECT v.title as vidTitle, v.url as url
            FROM video v, video_theme vt, theme t
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND t.idTheme = {$idTheme}
            ORDER BY v.idVideo DESC
            LIMIT {$nb}
        ",__CLASS__);
    }
}
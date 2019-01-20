<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 09:52
 */

namespace App\Model;

class Video extends Table
{
    protected $table = "video";


    public function getLast($nb = 100)
    {

        return $this->db->queryAll("SELECT * FROM ".$this->table." ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

    public function getLastByTheme($idTheme = 1,$nb = 100)
    {
        return $this->db->queryAll("
            SELECT v.title as vidTitle, v.url as url, v.thumbnail as thumbnail
            FROM ".$this->table." v, video_theme vt, theme t
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND t.idTheme = {$idTheme}
            ORDER BY v.idVideo DESC
            LIMIT {$nb}
        ",__CLASS__);
    }
}
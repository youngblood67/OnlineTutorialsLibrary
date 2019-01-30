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

    public function getAllVideoInfoById($idVideo){
        return $this->db->querySingle("
            SELECT *
            FROM ".$this->table." v, video_theme vt, theme t, tag ta, video_tag vta
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND v.idVideo = vta.idVideo
            AND vta.idTag = ta.idTag 
            AND v.idVideo = {$idVideo}     
        ",__CLASS__);
    }

    public function getLastByTheme($idTheme = 1,$nb = 100)
    {
        return $this->db->queryAll("
            SELECT v.idVideo as idVideo, v.titleVideo as titleVideo, v.urlVideo as url, v.thumbnailVideo as thumbnail, t.idTheme as idTheme
            FROM ".$this->table." v, video_theme vt, theme t
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND t.idTheme = {$idTheme}
            ORDER BY v.idVideo DESC
            LIMIT {$nb}
        ",__CLASS__);
    }

    public function getVideoThumbnail($videoUrl)
    {
        $videoSplit =explode("/", $videoUrl);
        $videoId = $videoSplit[4];
        return "http://img.youtube.com/vi/".$videoId."/hqdefault.jpg";

    }

    public function getSearchContent($searchContent)
    {
        $searchSplitWords = explode(" ", $searchContent);
         
        $req = "SELECT * FROM ".$this->table." 
        WHERE ";
        
        for($i=0; $i<count($searchSplitWords); $i++)
        {
            if($i==0){
                $req.="titleVideo LIKE '%{$searchSplitWords[$i]}%'";
            }
            else {
                $req.=" AND titleVideo LIKE '%{$searchSplitWords[$i]}%'";
            }
            
        }
        
        return $this->db->queryAll($req, __CLASS__);
        
    }
}
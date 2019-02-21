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


    public function getVideoById($id){
        return $this->db->querySingle("SELECT * FROM ".$this->table." WHERE idVideo = {$id}", __CLASS__);
    }

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

    public function addVideoUser($idVideo,$idUser,$pid){
        $stmt=$this->db->getPDO()->prepare("INSERT INTO video_user (idVideo, idUser, datePurchase,pid) VALUES (:idVideo, :idUser, NOW(),pid)");
        $stmt->bindParam(':idVideo', $idVideo);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        $this->db->closeConnection();
        return $stmt;
    }

    public function getYoutubeVideoThumbnail($idYoutube)
    {
        
        return "http://img.youtube.com/vi/".$idYoutube."/hqdefault.jpg";

    }

    public function getDriveVideoThumbnail($urlVideo)
    {
        
        return "http://localhost/onlinetutorialslibrary/videos/".$urlVideo.".PNG";

    }
    
    public function getSearchContent($searchContent)
    {
        $offset = 0;
        while (($pos = strpos($searchContent, '\'', $offset)) !== false) {
            $searchContent = str_replace('\'', " ", $searchContent);
            $offset = $pos+1;
        }

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
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
    


    public function getVideoById($id)
    {
        return $this->db->querySingle("SELECT * FROM " . $this->table . " WHERE idVideo = {$id}", __CLASS__);
    }

    public function getLast($nb = 100)
    {
        return $this->db->queryAll("SELECT * FROM " . $this->table . " ORDER BY idVideo DESC LIMIT {$nb}", __CLASS__);
    }

    public function getAllVideoInfoById($idVideo)
    {
        return $this->db->querySingle("
            SELECT *
            FROM " . $this->table . " v, video_theme vt, theme t, tag ta, video_tag vta
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND v.idVideo = vta.idVideo
            AND vta.idTag = ta.idTag 
            AND v.idVideo = {$idVideo}     
        ", __CLASS__);
    }

    public function getLastByTheme($idTheme = 1, $nb = 100)
    {
        return $this->db->queryAll("
            SELECT v.idVideo as idVideo, v.titleVideo as titleVideo, v.urlVideo as url, v.thumbnailVideo as thumbnail, t.idTheme as idTheme
            FROM " . $this->table . " v, video_theme vt, theme t
            WHERE v.idVideo = vt.idVideo 
            AND vt.idTheme = t.idTheme
            AND t.idTheme = {$idTheme}
            ORDER BY v.idVideo DESC
            LIMIT {$nb}
        ", __CLASS__);
    }

    public function verifyIfExistVideoUser($idUser, $idVideo)
    {
        $stmt = $this->db->querySingle("SELECT count(*) as count
            FROM video_user vu
            WHERE vu.idUser = {$idUser}
            AND vu.idVideo = {$idVideo}", __CLASS__);

        return $stmt->count;

    }

    public function addVideoUser($idVideo, $idUser, $pid)
    {
        $stmt = $this->db->getPDO()->prepare("INSERT INTO video_user (idVideo, idUser, datePurchase,pid) VALUES (:idVideo, :idUser, NOW(),:pid)");
        $stmt->bindParam(':idVideo', $idVideo);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        $this->db->closeConnection();
        return $stmt;
    }


    public function getAllVideosFromUserById($idUser)
    {
        return $this->db->queryAll("SELECT *
            FROM user u,video v, video_user vu
            WHERE u.idUser = vu.idUser
            AND v.idVideo = vu.idVideo
            AND u.idUser = {$idUser}", __CLASS__);

    }

    
    public function getYoutubeVideoThumbnail($idYoutube)
    {

        return "http://img.youtube.com/vi/" . $idYoutube . "/maxresdefault.jpg";

    }

    public function getDriveVideoThumbnail($urlVideo)
    {

        return "http://localhost/onlinetutorialslibrary/videos/" . $urlVideo . ".PNG";

    }

    public function getSearchContent($searchContent)
    {
        $searchSplitWords = explode(" ", $searchContent);
        $valeurs = array();
        $req = "SELECT * FROM " . $this->table . " v join video_theme vt on v.idVideo=vt.idVideo 
        join theme t on t.idTheme=vt.idTheme 
        WHERE ";

        for ($i = 0; $i < count($searchSplitWords); $i++) {
            if ($i == 0) {
                $req .= "(v.titleVideo LIKE ? OR t.titleTheme LIKE ?)";
                array_push($valeurs, "%$searchSplitWords[$i]%", "%$searchSplitWords[$i]%");

            } else {
                $req .= " AND (v.titleVideo LIKE ? OR t.titleTheme LIKE ?)";
                array_push($valeurs, "%$searchSplitWords[$i]%", "%$searchSplitWords[$i]%");
            }
        }

        $req .= " GROUP BY v.titleVideo ORDER BY v.titleVideo";

        $stmt = $this->db->getPDO()->prepare($req);
        $stmt->execute($valeurs);

        return $stmt->fetchAll();

        //SELECT v.titleVideo, t.titleTheme 
        //FROM video v join video_theme vt on v.idVideo=vt.idVideo 
        //join theme t on t.idTheme=vt.idTheme 
        //where t.titleTheme like '%des%' 

    }

    public function getVideosByTheme($theme) {
        $req = "SELECT * FROM {$this->table} 
        v join video_theme vt on v.idVideo=vt.idVideo 
        join theme t on t.idTheme=vt.idTheme 
        WHERE t.titleTheme = '{$theme}'";

        return $this->db->queryAll($req, __CLASS__);
    }

    public function getFreeVideo()
    {
        return $this->db->queryAll("SELECT * FROM " . $this->table . " WHERE priceVideo = 0", __CLASS__);
    }

    public function getPurchasedVideos($userId) {
        $req = "SELECT * FROM {$this->table} v 
        join video_user vu on v.idVideo=vu.idVideo 
        join user u on u.idUser = vu.idUser
        WHERE u.idUser = '{$userId}'";

        return $this->db->queryAll($req, __CLASS__);
    }

    public function getRating($idVideo) {
        $req = "SELECT rating FROM rating  
        WHERE idVideo = '{$idVideo}'";

        return $this->db->queryAll($req, __CLASS__);
    }

    

    

}
<?php
namespace App\Model;

class Rating extends Table
{
    protected $table = "rating";

    public function addRating ($idVideo, $idUser, $rating)
    {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO ".$this->table." (idVideo, idUser, rating) VALUES (:idVideo, :idUser, :rating)");
            $stmt->bindParam(':idVideo', $idVideo);
            $stmt->bindParam(':idUser', $idUser);
            $stmt->bindParam(':rating', $rating);
            $stmt->execute();
            $this->db->closeConnection();
       
    }

    public function verifyIfRateExists($idUser, $idVideo)
    {
        $stmt = $this->db->querySingle("SELECT count(*) as count
            FROM rating r
            WHERE r.idUser = {$idUser}
            AND r.idVideo = {$idVideo}", __CLASS__);

        return $stmt->count;

    }

    public function updateRating($idVideo, $idUser, $rating)
    {
        $stmt = $this->db->getPDO()->prepare("UPDATE ".$this->table." 
        SET idVideo=:idVideo, idUser=:idUser, rating=:rating
        WHERE idVideo=:idVideo AND idUser=:idUser");
        $stmt->bindParam(':idVideo', $idVideo);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();
        $this->db->closeConnection();

    }

    public function getRating($idVideo) {
        $req = "SELECT rating FROM rating  
        WHERE idVideo = '{$idVideo}'";

        return $this->db->queryAll($req, __CLASS__);
    }

    /*public function getCommentsByIdVideo ($idVideo)
    {
        return $this->db->queryAll("SELECT * FROM ".$this->table." WHERE idVideo = {$idVideo}", __CLASS__);
    }

    public function getCommentByIdVideoAndIdUser ($idVideo,$idUser)
    {
        return $this->db->querySingle("SELECT * FROM ".$this->table." WHERE idVideo = {$idVideo} AND idUser = {$idUser}", __CLASS__);
    }

    public function getCommentsByIdUser ($idUser)
    {
        return $this->db->querySingle("SELECT * FROM ".$this->table." WHERE idUser = {$idUser}", __CLASS__);
    }

    public function getCommentsAndUserInfoByIdVideo ($idVideo)
    {
        return $this->db->queryAll("SELECT c.*, u.firstname, u.lastname 
        FROM ".$this->table." c
        JOIN user u on c.idUser = u.idUser
        WHERE idVideo = {$idVideo}
        ORDER BY c.idComment desc", __CLASS__);
    }*/
}

?>
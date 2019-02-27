<?php
namespace App\Model;

class Comment extends Table
{
    protected $table = "comment";

    public function addComment ($idVideo, $idUser, $commentContent)
    {
        
        $stmt = $this->db->getPDO()->prepare("INSERT INTO " . $this->table . "  (idVideo, idUser, contentComment, dateComment)
        VALUES (:idVideo, :idUser, :commentContent, LOCALTIME())");
        $stmt->bindParam(':idVideo', $idVideo);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':commentContent', $commentContent);
        $stmt->execute();
        $this->db->closeConnection();
    }

    public function getCommentsByIdVideo ($idVideo)
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
    }
}

?>
<?php
namespace App\Model;

class Comment extends Table
{
    protected $table = "comment";

    public function addComment ($idVideo, $idUser, $commentContent)
    {
        
        $stmt = $this->db->getPDO()->prepare("INSERT INTO " . $this->table . "  (idVideo, idUser, contentComment)
        VALUES (:idVideo, :idUser, :commentContent)");
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
}

?>
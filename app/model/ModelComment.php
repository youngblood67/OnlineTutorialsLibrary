<?php
namespace App\Model;

class ModelComment extends Table
{
    protected $table = "comment";

    public function addComment ($idVideo, $idUser, $commentContent, $commentRating)
    {
        
        $stmt = $this->db->getPDO()->prepare("INSERT INTO " . $this->table . "  (idVideo, idUser, contentComment, ratingComment)
        VALUES (:idVideo, :idUser, :commentContent, :commentRating)");
        $stmt->bindParam(':idVideo', $idVideo);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':commentContent', $commentContent);
        $stmt->bindParam(':commentRating', $commentRating);
        $stmt->execute();
        $this->db->closeConnection();
    }

    public function getCommentByVideoId ($idVideo)
    {
        return $this->db->querySingle("SELECT * FROM ".$this->table." WHERE idVideo = {$idVideo}", __CLASS__);
    }
}

?>
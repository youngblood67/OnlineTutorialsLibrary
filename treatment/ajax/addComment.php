<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Comment;

$comment = new Comment();
if (isset($_POST['idVideo'])) {
    $idVideo = $_POST['idVideo'];
}

if (isset($_POST['idUser'])) {
    $idUser = $_POST['idUser'];
}

if (isset($_POST['commentContent'])) {
    $commentContent = $_POST['commentContent'];
} 

/*if (isset($_POST['commentRating'])) {
    $commentRating = $_POST['commentRating'];
} */

$comment->addComment($idVideo, $idUser, $commentContent);
//echo "ok";

/*if(isset($_POST["q"])){
    $videoId = $_POST["q"];
    $comment = new Comment();
    $commentList = $comment->getCommentsAndUserInfoByIdVideo($videoId);
    echo json_encode($commentList);
    
}*/
    
    
      
   
?>
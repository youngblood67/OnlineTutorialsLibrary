<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Comment;


if(isset($_POST["q"])){
    $videoId = $_POST["q"];
    $comment = new Comment();
    $commentList = $comment->getCommentsAndUserInfoByIdVideo($videoId);
    echo json_encode($commentList);
    
}
    
    
      
   
?>
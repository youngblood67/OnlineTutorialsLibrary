<?php

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\ModelComment;


if(isset($_POST["q"])){
    $videoId = $_POST["q"];
    $comment = new ModelComment();
    $commentList = $comment->getCommentByVideoId($videoId);
    echo json_encode($commentList);
    
}
    
    
      
   
?>
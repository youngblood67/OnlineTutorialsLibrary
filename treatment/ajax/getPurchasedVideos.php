<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Video;


if(isset($_POST["q"])){
    $userId = $_POST["q"];
    $video = new Video();
    $videoList = $video->getPurchasedVideos($userId);
    echo json_encode($videoList);
    
}
  
?>
<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Video;


if(isset($_POST["q"])){
    $videoId = $_POST["q"];
    $video = new Video();
    $ratingList = $video->getRating($videoId);
    echo json_encode($ratingList);
    
}
    
    
      
   
?>
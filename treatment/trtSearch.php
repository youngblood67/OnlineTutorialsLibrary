<?php

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Video;


if(isset($_POST["q"])){
    $searchContent = $_POST["q"];
    $video = new Video();
    $videos = $video->getSearchContent($searchContent);
    echo json_encode($videos);
    
}
    
    
      
   
?>
<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Video;
    $video = new Video();
    $videos = $video->getFreeVideo();
    echo json_encode($videos);
?>
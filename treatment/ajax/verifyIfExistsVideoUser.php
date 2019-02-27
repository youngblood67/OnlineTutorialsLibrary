<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Video;

$idUser = $_SESSION['idUser'];
if(isset($_POST["q"])){
    $idVideo = $_POST["q"];
    $video = new Video();
    $res = $video->verifyIfExistVideoUser($idUser, $idVideo);
    echo json_encode($res);
    
}
  
?>
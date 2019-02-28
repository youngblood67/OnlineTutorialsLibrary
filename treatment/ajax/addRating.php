<?php

require '../../app/Autoloader.php';
App\Autoloader::register();

use App\Model\Rating;

$rating = new Rating();
if (isset($_POST['idVideo'])) {
    $idVideo = $_POST['idVideo'];
}

if (isset($_POST['idUser'])) {
    $idUser = $_POST['idUser'];
}

if (isset($_POST['rating'])) {
    $rateValue = $_POST['rating'];
} 



if ($rating->verifyIfRateExists($idUser, $idVideo)==0) {
    $rating->addRating($idVideo, $idUser,$rateValue);
}
else {
    $rating->updateRating($idVideo, $idUser,$rateValue);
}
   
?>
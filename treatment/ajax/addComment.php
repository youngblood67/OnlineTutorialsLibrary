<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();


if (isset($_POST['idVideo'])) {
    $idVideo = $_POST['idVideo'];
} else {
    $idVideo = "";

}

if (isset($_POST['idUser'])) {
    $idUser = $_POST['idUser'];
} else {
    $idUser = "";
}

if (isset($_POST['commentContent'])) {
    $commentContent = $_POST['commentContent'];
} else {
    $commentContent = "";
}

if (isset($_POST['commentRating'])) {
    $commentRating = $_POST['commentRating'];
} else {
    $commentRating = "";
}

;
$firstname = \App\Model\User::getUserById($idUser)->firstname;

echo "<span class='name'>".$firstname ." :  </span>" . $commentContent;
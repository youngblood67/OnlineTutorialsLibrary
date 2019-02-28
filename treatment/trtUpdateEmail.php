<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

if(isset($_POST['newEmail'])) {
    $newEmail = $_POST['newEmail'];
}else{
    $newEmail="";
}

$user = new \App\Model\User();
$user->updateEmail($_SESSION['email'],$newEmail);
session_unset();
session_destroy();
header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil&con=deconnexion');
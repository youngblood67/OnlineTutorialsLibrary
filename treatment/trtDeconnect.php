<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

if ($_SESSION['con'] == "loggedOn") {
    $_SESSION['con'] = "loggedOff";
    header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil');
}
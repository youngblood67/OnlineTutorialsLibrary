<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

if ($_SESSION['con'] == "loggedOn") {
    session_unset();
    session_destroy();
    header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil&con=deconnexion');
}
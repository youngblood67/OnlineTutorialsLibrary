<?php
session_start();

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\User;

if (isset($_POST["email"])) {
    $email = $_POST["email"];
}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
}

if ($_SESSION['con'] == "loggedOff") {
    if (User::connection($email, $password)) {
        $_SESSION['con'] = "loggedOn";
    }
    header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil');
}
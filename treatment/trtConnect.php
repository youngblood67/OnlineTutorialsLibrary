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

$error = "";
if (!isset($_SESSION['con'])) {
    if (User::connection($email, $password)) {
        $_SESSION['con'] = "loggedOn";
        $_SESSION['email'] = User::getUser($email)->email;
        $_SESSION['firstname'] = User::getUser($email)->firstname;
        $_SESSION['lastname'] = User::getUser($email)->lastname;
        $_SESSION['status'] = User::getStatus($email);
    } else {
        $error = "&error=1";
    }
    header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);
}
<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\User;

if (isset($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
}
if (isset($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
}
if (isset($_POST["email"])) {
    $email = $_POST["email"];
}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
}
if (isset($_POST["passwordVerif"])) {
    $passwordVerif = $_POST["passwordVerif"];
}


if ($password !== $passwordVerif) {
    $error = "&error=2";
    header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);
} else {

    $user = new User();
    if (User::verifyIfUserExist($email) == 0) {
        $user->addUser($lastname, $firstname, $password, $email);
        $_SESSION['con'] = "loggedOn";
        $_SESSION['email'] = User::getUser($email)->email;
        $_SESSION['firstname'] = User::getUser($email)->firstname;
        $_SESSION['lastname'] = User::getUser($email)->lastname;
        $_SESSION['status'] = '0';
    } else {
        $error = "&error=1";
    }

header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);

}

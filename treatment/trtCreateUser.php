<?php
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

$user = new User();
$user->addUser($lastname, $firstname, $password, $email);




header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);



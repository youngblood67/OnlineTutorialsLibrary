<?php

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\User;

if (isset($_POST["email"])) {
    $email = $_POST["email"];
}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
}

if (User::connection($email, $password)) {
    $con = "ok";
} else {
    $con = "refused";
};
header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil&con=' . $con);
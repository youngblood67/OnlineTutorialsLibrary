<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();


$user = new \App\Model\User();

$user->deleteAccount(\App\Model\User::getIdUser($_SESSION['email']));

session_destroy();
header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil&con=deconnexion');
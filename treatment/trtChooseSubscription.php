<?php
session_start();

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\User;


$user = User::getUser($_SESSION['email']);
$subscriptionType = $_POST['subscriptions'];
$idUser = $user->idUser;
$_SESSION['status'] = User::addSubscription($idUser,$subscriptionType);

header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil');
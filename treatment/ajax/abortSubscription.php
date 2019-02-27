<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();

$sub = new \App\Model\Subscription();
$sub->deleteSubscriptionFromUser(\App\Model\User::getIdUser($_SESSION['email']));
echo "Annulation effectuée";
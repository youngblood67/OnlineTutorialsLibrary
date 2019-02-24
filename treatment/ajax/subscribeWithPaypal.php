<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();

$paymentID = $_SESSION['paymentID'];

$payerID = $_SESSION['payerID'];

$token = $_SESSION['token'];

$pid = $_SESSION['pid'];

$amount = $_SESSION['amount'];

$idUser = $_SESSION['idUser'];

$idSubscription = $_SESSION['idSubscription'];

$paypalPayment = new \App\Model\PaypalPayment();

$paypalPayment->order($pid, $idUser, $payerID, $paymentID, $token, $amount);



echo "<ul id='list-group'>";




\App\Model\User::addSubscription($idUser,$idSubscription);
$sub = new \App\Model\Subscription();
$subscription= $sub->getSubscriptionById($idSubscription);
$_SESSION['status'] = $subscription->typeSubscription;
echo "<li class='line-results list-group-item'>" . $subscription->titleSubscription . "  :  ".$amount." €</li>";

echo "</ul";

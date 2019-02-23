<?php
session_start();
require '../../app/Autoloader.php';
App\Autoloader::register();

$stringTabIdVideo = $_POST['tabIdVideo'];

$paymentID = $_SESSION['paymentID'];

$payerID = $_SESSION['payerID'];

$token = $_SESSION['token'];

$pid = $_SESSION['pid'];

$amount = $_SESSION['amount'];

$idUser = $_SESSION['idUser'];

$video = new \App\Model\Video();
$paypalPayment = new \App\Model\PaypalPayment();

$paypalPayment->order($pid, $idUser, $payerID, $paymentID, $token, $amount);

echo "<ul id='list-results'>";

$tabIdVideo = explode(",", trim($stringTabIdVideo, '\[\]'));

for ($i = 0; $i < sizeof($tabIdVideo); $i++) {
    $idVideo = $tabIdVideo[$i];
    $video->addVideoUser($idVideo, $idUser, $pid);
    echo "<li class='line-results'>" . $video->getVideoById($idVideo)->titleVideo . " : " . $video->getVideoById($idVideo)->priceVideo . " €</li>";
}
echo "</ul";

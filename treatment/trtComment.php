<?php
session_start();

require '../app/Autoloader.php';
App\Autoloader::register();

use App\Model\User;
use App\Model\Comment;

$comment = new Comment();

$user = User::getUser($_SESSION['email']);
$idUser = $user->idUser;

if (isset($_POST["commentContent"])) {
    $commentContent = $_POST["commentContent"];
}
if (isset($_POST["idVideo"])) {
    $idVideo = $_POST["idVideo"];
}

$comment->addComment($idVideo, $idUser, $commentContent, null);


header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=videos&idVideo='.$idVideo);
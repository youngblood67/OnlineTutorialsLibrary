<h1>PROFIL</h1>

<h2>USER</h2>
<?php
var_dump(\App\Model\User::getUser($_SESSION['email']));
$idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;

?>

<h2>VIDEOS</h2>
<?php
var_dump(\App\Model\User::getAllVideosFromUserById($idUser));
?>
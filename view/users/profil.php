
<div class="container-fluid text-center">
    <div class="jumbotron">
        <h1 class="display-4">Profil</h1>
        <?php

        $user = \App\Model\User::getUser($_SESSION['email']);
        $subscription = \App\Model\User::getStatus($_SESSION['email'])
        ?>
        <div class="col-12">
            <?= $user->lastname ?>
        </div>
        <div class="col-12">
            <?= $user->firstname ?>
        </div>
        <div class="col-12">
            <?= $user->email ?>
        </div>
        <div class="col-12">
            Type d'abonnement : <?= $subscription ?>
        </div>
        <hr class="my-4">

        <h1 class="display-4">Videos</h1>
        <?php
        $idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;
        $videos = \App\Model\User::getAllVideosFromUserById($idUser); ?>
        <?php foreach ($videos as $vid): ?>
            <?= var_dump($vid) ?>

        <?php endforeach; ?>
    </div>





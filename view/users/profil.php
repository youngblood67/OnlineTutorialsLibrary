<div class="container-fluid text-center">
    <div class="jumbotron">
        <h1 class="display-4">Profil</h1>
        <?php

        $user = \App\Model\User::getUser($_SESSION['email']);
        $subscription = \App\Model\User::getStatus($_SESSION['email']);
        $video = new \App\Model\Video();
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


        <?php
        $idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;
        $videos = $video->getAllVideosFromUserById($idUser); ?>
        <?php if (sizeof($videos) > 1): ?>
            <h1 class="display-4">Videos achetées</h1>
        <?php elseif (sizeof($videos) == 1): ?>
            <h1 class="display-4">Video achetée</h1>
        
        <?php endif; ?>
        <ul id="buy-list list-group">
            <?php foreach ($videos as $vid): ?>
                <li class="list-group-item"><?= $vid->titleVideo ?></li>

            <?php endforeach; ?>
        </ul>
    </div>





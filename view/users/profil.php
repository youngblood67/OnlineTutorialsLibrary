<div class="container-fluid text-center">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?php

                $user = \App\Model\User::getUser($_SESSION['email']);
                $subscription = \App\Model\User::getStatus($_SESSION['email']);
                $video = new \App\Model\Video();
                ?>
                <ul id="ul-profil"><h1 class="border1 display-4 list-group">Profil</h1>
                    <li class="col-12 list-group-item">
                        <span class="valeur">Nom : </span><?= $user->lastname ?>
                    </li>
                    <li class="col-12 list-group-item">
                        <span class="valeur">Prénom : </span> <?= $user->firstname ?>
                    </li>
                    <li class="col-12 list-group-item">
                        <span class="valeur">Email : </span> <?= $user->email ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul id="ul-member"><h1 class="border1 display-4">Abonnement</h1>
                    <li class="list-group-item">
                        <?php if (\App\Model\User::isSubscribed($_SESSION["email"]) == 0) : ?>
                            <div><span class="valeur">pas d'abonnement actif </span></div>
                            <div><button id="btn-subscribe" type="button" class="btn btn-sm btn-primary margin">s'abonner</button></div>
                        <?php else: ?>
                            <span class="valeur">abonnement de type <?= \App\Model\User::isSubscribed($_SESSION["email"]) ?></span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-12">   <?php
                $idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;
                $videos = $video->getAllVideosFromUserById($idUser); ?>
                <?php if (sizeof($videos) > 1): ?>
                    <h1 class="display-4 border1">Videos achetées</h1>
                <?php elseif (sizeof($videos) == 1): ?>
                    <h1 class="display-4 border1">Video achetée</h1>

                <?php endif; ?>
                <ul id="buy-list list-group">
                    <?php $cpt = 0; ?>
                    <?php foreach ($videos as $vid): ?>
                        <?php $cpt++; ?>
                        <li class="list-group-item"><span
                                    class="valeur">vidéo n°<?= $cpt ?> : &nbsp;</span><?= $vid->titleVideo ?></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


    </div>





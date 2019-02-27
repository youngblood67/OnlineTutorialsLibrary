<div class="container-fluid text-center">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?php

                use App\Model\User;

                $user = \App\Model\User::getUser($_SESSION['email']);
                $subscription = \App\Model\User::getStatus($_SESSION['email']);
                $video = new \App\Model\Video();
                $endDate = "";
                $idUser = User::getIdUser($_SESSION["email"]);
                if (User::isSubscribed($_SESSION['email'])) {
                    $idSubscription = User::getUserSubscription(User::getIdUser($_SESSION["email"]))->idSubscription;
                    $sub = new \App\Model\Subscription();
                    $subscription = $sub->getSubscriptionById($idSubscription);
                    $endDate = $sub->getUserSubscriptionEndDate($idUser);
                    $date = new DateTime($endDate);
                }
                ?>
                <ul id="ul-profil"><h4 class="border1 list-group">Profil</h4>
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
                <ul id="ul-member"><h4 class="border1">Abonnement</h4>
                    <div id="content-subscription">
                        <?php if (\App\Model\User::isSubscribed($_SESSION["email"]) == 0) : ?>
                            <li class="list-group-item">
                                <div><span class="valeur">pas d'abonnement actif </span></div>
                                <div>
                                    <button id="btn-subscribe" type="button" class="btn btn-sm btn-primary margin">
                                        s'abonner
                                    </button>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="list-group-item">
                                <span class="valeur">abonnement de type <span class="val"> <?= $idSubscription ?></span></span>
                            </li>
                            <li class="list-group-item">
                                <span class="description"><?= $subscription->descriptionSubscription ?></span>

                            </li>
                            <li class="list-group-item">
                                <span class="time-left"><?= "Prend fin le " ?><?= $date->format('d-m-Y'); ?></span><br/>
                                <?php if ($sub->getUserSubscriptionDayLeft($idUser) > 1) : ?>
                                    <?php $ch = "Jours restants : "; ?>
                                <?php else: ?>
                                   <?php  $ch = "Jour restant : "; ?>
                                <?php endif; ?>
                                <span class="day-left"><?= $ch ?><?= $sub->getUserSubscriptionDayLeft($idUser) ?></span>

                            </li>

                            <li class="list-group-item">
                                <button type="button" id="btn-abort" class="btn-sm btn-danger">Annuler</button>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-12">   <?php
                $idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;
                $videos = $video->getAllVideosFromUserById($idUser); ?>
                <?php if (sizeof($videos) > 1): ?>
                    <h4 class="border1">Videos achetées</h4>
                <?php elseif (sizeof($videos) == 1): ?>
                    <h4 class="border1">Video achetée</h4>

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





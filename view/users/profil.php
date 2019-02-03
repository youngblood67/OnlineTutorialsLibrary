<div class="container-fluid">
    <div class="block1">
        <div class="row back1">
            <div class="col-3"></div>
            <div class="col-4"><h2>PROFIL</h2></div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-4">
                <div class="row">
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
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <div class="block2">
        <div class="row back1">
            <div class="col-3"></div>
            <div class="col-4"><h2>VIDEOS</h2></div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-4"><?php
                $idUser = \App\Model\User::getUser($_SESSION['email'])->idUser;
                $videos = \App\Model\User::getAllVideosFromUserById($idUser); ?>
                <?php foreach ($videos as $vid): ?>
                    <?= var_dump($vid) ?>

                <?php endforeach; ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

</div>




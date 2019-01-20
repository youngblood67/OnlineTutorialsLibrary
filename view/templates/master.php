<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TutosVideos</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/ressources/css/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/ressources/css/shop-homepage.css" rel="stylesheet">

    <link href="../public/ressources/css/style-general.css" rel="stylesheet">

    <!-- My css files -->
    <?= $css ?>

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><?= \App\Config::getInstance()->get('site_title') ?></a>
        <?= $msg ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $activeHome ?>">
                    <a class="nav-link" href="../public/index.php?p=accueil">Accueil
                    </a>
                </li>
                <li class="nav-item <?= $activeSearch ?> ">
                    <a class="nav-link" href="../public/index.php?p=recherche">Recherche</a>
                </li>


            </ul>
            <?php if (!isset($_SESSION['con'])): ?>
                <button style="margin-right: 10px;" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal"
                        data-target="#subscribeModal">Inscription
                </button>
                <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#connexionModal">
                    Connexion
                </button>
            <?php elseif ($_SESSION['con'] === "loggedOn") : ?>
                <?php if (!((isset($_SESSION['status']) && (intval($_SESSION['status']) >= 1))))  : ?>
                    <button class="btn btn-outline-primary my-2 my-sm-0" style="margin-right:10px;"
                            data-toggle="modal" data-target="#subscriptionTypeModal">
                        Abonnement
                    </button>
                <?php endif; ?>
                <a href="../treatment/trtDeconnect.php">
                    <button class="btn btn-outline-warning my-2 my-sm-0">
                        Déconnexion
                    </button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?= $content; ?>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Marc & Phil 2018-2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="subscribeModalLabel">Inscrivez-vous !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include '../view/users/createUser.php';
                ?>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="subscribeModalLabel">Connectez-vous !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include '../view/users/connectUser.php';
                ?>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="subscriptionTypeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="subscribeModalLabel">Choisissez votre abonnement !</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                include '../view/users/chooseSubscription.php';
                ?>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="../public/ressources/js/jquery/jquery.min.js"></script>
<script src="../public/ressources/js/bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>



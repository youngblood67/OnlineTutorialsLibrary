<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TutosVideos</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/ressources/css/bootstrap/bootstrap.css" rel="stylesheet">

    <link href="../public/ressources/css/style-general.css" rel="stylesheet">
    <link href="../public/ressources/css/style-modals.css" rel="stylesheet">

    <!-- My css files -->
    <?= $css ?>

    <!-- My js files -->
    <?= $jsUp ?>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top d-flex">
        <div class="row ml-2">
            <a class="navbar-brand"
                href="../public/index.php?p=accueil"><?= \App\Config::getInstance()->get('site_title') ?>
            </a>
            <button class="btn btn-outline-light ml-2" type="button" id="btn_categories">Catégories</button>

        </div>

        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto"></ul>

            <div class="input-group m-lg-auto mt-2 mb-sm-2" id="search-input">
                <input class="form-control" type="search" placeholder="Rechercher" aria-label="Search"
                    name="searchInput" id="searchInput">
            </div>

            
            <?php if (!isset($_SESSION['con'])): ?>
            
            <button id="btn-connexion" class="btn btn-primary my-2 my-sm-0 mr-2" data-toggle="modal"
                data-target="#connexionModal">
                Connexion
            </button>
            <button class="btn btn-danger my-2 mr-3" data-toggle="modal"
                data-target="#subscribeModal">Inscription
            </button>
            <?php elseif ($_SESSION['con'] === "loggedOn") : ?>
            <div class="row mr-3 ">
            <button id="btn-basket" class="btn btn-outline-primary my-2 mr-2" data-toggle="modal"
                data-target="#basketModal">
                Panier <span id="quantity-in-basket" class="badge badge-light"></span>
            </button>
            <a href="../public/index.php?p=profil"><?= $login ?></a>
            </div>
            <?php endif; ?>
            




        </div>


    </nav>

    <div id="div_categories">
        <?php
        $theme = new \App\Model\Theme();
        $themesList = $theme->getThemesList();
        $themePopOverHTML ="";
        foreach($themesList as $tl): 
    ?>
        <div id="category" name="<?=$tl->titleTheme?>" onclick="getThemeName(this.attributes['name'].value)">
            <div id="category_text">
                <h5>
                    <nobr><?=$tl->titleTheme?></nobr>
                </h5>
            </div>
        </div>


        <?php
        endforeach;
    ?>
        <div id="category" onclick="getFreeVideosWithAjax()">
            <div id="category_text">
                <h5>
                    <nobr>VIDEOS GRATUITES</nobr>
                </h5>
            </div>
        </div>
        <div id="category" onclick="getPurchasedVideosWithAjax(<?=$idUser?>)">
            <div id="category_text">
                <h5>
                    <nobr>VIDEOS ACHETEES</nobr>
                </h5>
            </div>
        </div>

    </div>
    <div id="msg-error">
        <?= $msgError ?>
    </div>
    <?= $content; ?>

    <div id="footer-container">
        <!-- Footer -->
        <footer class="py-3 bg-dark">

            <p class="m-0 text-center text-white">Copyright &copy; Marc & Phil 2018-2019</p>

            <!-- /.container -->
        </footer>
    </div>

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

    <div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="connexionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="connexionModalLabel">Connectez-vous !</h4>
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

    <div class="modal fade" id="subscriptionTypeModal" tabindex="-1" role="dialog"
        aria-labelledby="subscriptionTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="subscriptionTypeModalLabel">Choisissez votre abonnement !</h4>
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

    <div class="modal fade" id="basketModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="basketModalLabel">Panier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <ul id="basketList"></ul>

                </div>
                <div class="group-btn-basket">
                    <button id="btn-buy-basket" type="button" class="btn btn-success"
                        data-dismiss="modal">Acheter</button>
                    <button id="btn-clear-basket" type="button" class="btn btn-warning"
                        data-dismiss="modal">Vider</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../public/ressources/js/jquery/jquery.min.js"></script>
    <script src="../public/ressources/js/bootstrap/bootstrap.bundle.min.js"></script>

    <script src="../public/ressources/js/script.js"></script>
    <script src="../public/ressources/js/basket.js"></script>
    <script src="../public/ressources/js/subscribe.js"></script>
    <?= $jsDown ?>
    <?= $jsDown2 ?>

</body>

</html>
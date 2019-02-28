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
            <button class="btn btn-danger my-2 mr-3" data-toggle="modal" data-target="#subscribeModal">Inscription
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
        <?php if (isset($_SESSION['con'])): ?>
        <div id="category" onclick="getPurchasedVideosWithAjax(<?=$idUser?>)">
            <div id="category_text">
                <h5>
                    <nobr>VIDEOS ACHETEES</nobr>
                </h5>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <div id="msg-error">
        <?= $msgError ?>
    </div>
    <?= $content; ?>

    <div id="footer-container">
        <!-- Footer -->
        <footer class="py-3 bg-dark">

            <p class="m-0 text-center text-white">Copyright &copy; Marc & Phil 2018-2019 -<small class="ml-2"
                    id="cgv" data-toggle="modal" data-target="#cgvModal">Conditions générales de vente</small></p>

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

    <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ratingModalTitle">Donnez une note à la vidéo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="ratingModalBody">
                        <div id="ratingStars" class="row"></div>
                        <h1 class='text-warning col'>
                            <span id="star0" class="star">&#9734;</span>
                            <span id="star1" class="star">&#9734;</span>
                            <span id="star2" class="star">&#9734;</span>
                            <span id="star3" class="star"> &#9734;</span>
                            <span id="star4" class="star">&#9734;</span>
                        </h1>

                        <button id="btn-rating" type="button" class="btn btn-primary mt-3 mb-3"
                            data-dismiss="modal">Noter la vidéo</button>
                    </div>
                </div>




            </div>
        </div>
    </div>


    <div class="modal fade" id="cgvModal" tabindex="-1" role="dialog" aria-labelledby=""
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cgvTitle">Conditions générales de vente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Article 1 - Objet

Les présentes conditions régissent les ventes par la société TutosVideos de vidéos de tutoriels informatiques. 

Article 2 - Prix

Les prix de nos produits sont indiqués en euros toutes taxes comprises (TVA et autres taxes applicables au jour de la commande), sauf indication contraire et hors frais de traitement et d'expédition. 

En cas de commande vers un pays autre que la France métropolitaine vous êtes l'importateur du ou des produits concernés. Des droits de douane ou autres taxes locales ou droits d'importation ou taxes d'état sont susceptibles d'être exigibles. Ces droits et sommes ne relèvent pas du ressort de la société 

.........(dénomination sociale). Ils seront à votre charge et relèvent de votre entière responsabilité, tant en termes de déclarations que de paiements aux autorités et organismes compétents de votre pays. Nous vous conseillons de vous renseigner sur ces aspects auprès de vos autorités locales. 

Toutes les commandes quelle que soit leur origine sont payables en euros.  

La société ......... (dénomination sociale) se réserve le droit de modifier ses prix à tout moment, mais le produit sera facturé sur la base du tarif en vigueur au moment de la validation de la commande et sous réserve de disponibilité. 

Les produits demeurent la propriété de la société ......... (dénomination sociale) jusqu'au paiement complet du prix.  

Attention : dès que vous prenez possession physiquement des produits commandés, les risques de perte ou d'endommagement des produits vous sont transférés. 

Article 3 - Commandes

 ......... (dénomination sociale) se réserve le droit de refuser les commandes de ......... (nombre) articles identiques. 
 Blah blah blah...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bien lu !</button>
                    
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
    <script src="../public/ressources/js/rating.js"></script>
    <?= $jsDown ?>
    <?= $jsDown2 ?>

</body>

</html>
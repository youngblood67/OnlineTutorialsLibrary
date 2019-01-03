<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><?=\App\Config::getInstance()->get('site_title')?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?p=accueil">Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?p=recherche">Recherche</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?p=inscription">Inscription</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div id="container">
    <div class="row justify-content-center">
        <form method="post" action="../treatment/trtCreateUser.php">

            <div class="form-group ">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname">
            </div>
            <div class="form-group ">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
            </div>

            <div class="form-group ">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group ">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-primary ">S'enregistrer</button>
            </div>
            
        </form>
    </div>
    
</div>

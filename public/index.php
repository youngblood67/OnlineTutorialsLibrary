<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

$config = \App\Config::getInstance();

// Initialisation des variables
$css = "";      // stocke la feuille de style spécifique à la page en fonction de $p
$activeHome = "";  //  permet de rendre le lien actif
$activeSearch = "";  // " "
$msg = ""; // stocke les messages d'erreur ou de déconnexion
$idVideo = "";
$infoCon="";
// Récupération des paramètres
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === "1") {
        $infoCon = "<div id='connection-error' class='info-con alert-danger' data-toggle='modal'
             data-target='#connexionModal'>Erreur de connexion ou mauvais mot de passe</div>";
    }
}
if (isset($_GET['con'])) {
    $con = $_GET['con'];
    if ($con === "deconnexion") {
        $infoCon = "<div id='deconnection' class='info-con alert-warning' data-toggle='modal'
             data-target='#connexionModal'>Vous vous êtes déconnectés</div>";
    }
}

//var_dump($_SESSION);

if (isset($_SESSION['con']) && $_SESSION['con'] === 'loggedOn') {
    if (isset($_SESSION['status']) && intval($_SESSION['status']) > 0) {
        $msg = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>abonné cat. " . $_SESSION['status'] . "</span></div>";
    } else {
        $msg = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>membre simple</span></div>";
    }
} else {
    $msg = "<div id='isInvited'>invité</div>";
}




ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/ressources/css/style-accueil.css" rel="stylesheet">';
    $activeHome = "active";
    require '../view/home.php';
} else if ($p === 'recherche') {
    $css = '<link href="../public/ressources/css/style-recherche.css" rel="stylesheet">';
    $activeSearch = "active";
    require '../view/search.php';
} else if ($p === 'videos') {
    if(isset($_GET['idVideo'])){
        $idVideo = $_GET['idVideo'];
    }
    $css = '<link href="../public/ressources/css/style-videos.css" rel="stylesheet">';
    require '../view/videos/videos.php';
}
$content = ob_get_clean();

require '../view/templates/master.php';

?>

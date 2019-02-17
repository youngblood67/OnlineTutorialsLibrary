<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

$config = \App\Config::getInstance();

if (isset($_SESSION['email'])) {
    $_SESSION['status'] = \App\Model\User::getStatus($_SESSION['email']);
} else {
    $_SESSION['status'] = "";
}

// Initialisation des variables
$css = "";      // stocke la feuille de style spécifique à la page en fonction de $p
$jsUp = "";
$jsDown = "";
$activeHome = "";  //  permet de rendre le lien actif
$activeSearch = "";  // " "
$msg = ""; // stocke les messages d'erreur ou de déconnexion
$idVideo = "";
$infoCon = "";
$checkSession = "";
// Récupération des paramètres
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error === "1") {
        $infoCon = "<div id='connectionError' title='TEST' data-toggle='modal'
             data-target='#connexionModal'>Erreur de connexion</div>";
    }
}
if (isset($_GET['con'])) {
    $con = $_GET['con'];
//    if ($con === "deconnexion") {
//        $infoCon = "<div id='deconnection' class='info-con alert-warning' data-toggle='modal'
//             data-target='#connexionModal'>Vous vous êtes déconnectés</div>";
//    }
}


if (isset($_SESSION['con']) && $_SESSION['con'] === 'loggedOn') {
    if (isset($_SESSION['status']) && intval($_SESSION['status']) > 0) {
        $msg = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>abonné cat. " . $_SESSION['status'] . "</span></div>";
    } else {
        $msg = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>membre simple</span></div>";
    }
} else {
    $msg = "";
}

//Ajout d'un lien si la personne est membre
if (isset($_SESSION['status']) && intval($_SESSION['status']) > 0) {
    $msg = "<a href='http://localhost/onlinetutorialslibrary/public/index.php?p=profil'>".$msg."</a>";
}


ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/ressources/css/style-accueil.css" rel="stylesheet">';
    $activeHome = "active";
    $jsDown = '<script src="../public/ressources/js/script.js"></script>';
    require '../view/home.php';
} else if ($p === 'videos') {
    if (isset($_GET['idVideo'])) {
        $idVideo = $_GET['idVideo'];
    }
    $css = '<link href="../public/ressources/css/style-videos.css" rel="stylesheet">';
    require '../view/videos/videos.php';
} else if ($p === 'profil') {
    $css = '<link href="../public/ressources/css/style-profil.css" rel="stylesheet">';
    require '../view/users/profil.php';

}
$content = ob_get_clean();

require '../view/templates/master.php';

?>

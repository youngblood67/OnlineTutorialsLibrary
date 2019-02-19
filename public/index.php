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
$login = ""; 
$idVideo = "";

// Récupération des paramètres
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];

}

if (isset($_GET['con'])) {
    $con = $_GET['con'];

}


if (isset($_SESSION['con']) && $_SESSION['con'] === 'loggedOn') {
    if (isset($_SESSION['status']) && intval($_SESSION['status']) > 0) {
        $login = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>abonné cat. " . $_SESSION['status'] . "</span></div>";
    } else {
        $login = "<div id='isConnected'>" . $_SESSION['firstname'] . "<span class='mini-logo'>membre simple</span></div>";
    }
} else {
    $login = "";
}

//Ajout d'un lien si la personne est membre
if (isset($_SESSION['status']) && intval($_SESSION['status']) > 0) {
    $login = "<a href='http://localhost/onlinetutorialslibrary/public/index.php?p=profil'>".$login."</a>";
}


ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/ressources/css/style-accueil.css" rel="stylesheet">';
    $activeHome = "active";
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

}else if ($p === 'achat') {
    $css = '<link href="../public/ressources/css/style-achat.css" rel="stylesheet">';
    $jsDown = '<script src="../public/ressources/js/buy.js"></script>';
    require '../view/videos/achat.php';

}
$content = ob_get_clean();

require '../view/templates/master.php';

?>

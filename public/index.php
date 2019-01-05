<?php
session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

$config = \App\Config::getInstance();

// Récupération des paramètres

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}

if (isset($_GET['con'])) {
    $con = $_GET['con'];
} else {
    $con = 'notLogged';
}

$css = "";
$activeHome = "";
$activeSearch = "";
//$activeVideo = ""
;
ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/ressources/css/style-accueil.css" rel="stylesheet">';
    $activeHome = "active";
    require '../view/home.php';
} else if ($p === 'recherche') {
    $css = '<link href="../public/ressources/css/style-recherche.css" rel="stylesheet">';
    $activeSearch = "active";
    require '../view/search.php';
} else if ($p === 'video') {
    $css = '<link href="../public/ressources/css/style-video.css" rel="stylesheet">';
//    $activeVideo = "active";
    require '../view/videos/video.php';
} else if ($p === 'inscription') {
    $css = '<link href="../public/ressources/css/style-createUser.css" rel="stylesheet">';
    require '../view/users/createUser.php';
}

$content = ob_get_clean();

require '../view/templates/master.php';

?>

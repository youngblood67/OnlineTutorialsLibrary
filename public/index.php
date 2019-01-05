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

echo $_SESSION['con'];
$css = "";
$activeHome = "";
$activeSearch = "";

ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/ressources/css/style-accueil.css" rel="stylesheet">';
    $activeHome = "active";
    require '../view/home.php';
} else if ($p === 'recherche') {
    $css = '<link href="../public/ressources/css/style-recherche.css" rel="stylesheet">';
    $activeSearch = "active";
    require '../view/search.php';
}

$content = ob_get_clean();

require '../view/templates/master.php';

?>

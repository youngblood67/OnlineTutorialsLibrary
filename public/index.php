<?php
require '../app/Autoloader.php';

App\Autoloader::register();

// Récupération des paramètres

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}

$css = "";

ob_start();

if ($p === 'accueil') {
    $css = '<link href="../public/css/style-accueil.css" rel="stylesheet">';
    require '../pages/accueil.php';
}else if ($p === 'recherche') {
    $css = '<link href="../public/css/style-recherche.css" rel="stylesheet">';
    require '../pages/recherche.php';
}else if ($p === 'video') {
    $css = '<link href="../public/css/style-video.css" rel="stylesheet">';
    require '../pages/videos/video.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

?>

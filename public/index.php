<?php
require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

if ($p === 'accueil') {
    require '../pages/accueil.php';
}else if ($p === 'recherche') {
    require '../pages/recherche.php';
}
?>

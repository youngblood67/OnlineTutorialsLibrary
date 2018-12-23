<?php
require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'accueil';
}

ob_start();

if ($p === 'accueil') {
    require '../pages/accueil.php';
}else if ($p === 'recherche') {
    require '../pages/recherche.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

?>

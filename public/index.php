<?php

use App\Database;
use App\Autoloader;

include '../app/Autoloader.php';
Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p='home';
}
//initialisation des objets
$db = new Database('blog_tuto');
ob_start();
if ($p === 'home') {
    require '../pages/home.php';
}elseif($p === 'post') {
    require '../pages/article.php';
}
$content =  ob_get_clean();// pour stocker notre content
require '../pages/templates/master.php';
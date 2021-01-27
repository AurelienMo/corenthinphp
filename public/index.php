<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\DefaultController;

$page = '';

if (!array_key_exists('page', $_GET)) {
    $page = 'home';
} else {
    $page = $_GET['page'];
}
$controller = new DefaultController();

switch ($page) {
    case 'home':
        //TODO Appeler controller retournant le contenu de la homepage
        echo $controller->home();
        break;
    case 'list':
        //TODO Appeler controller retournant le contenu de la liste des éléments
        echo $controller->listArticles();
        break;
}

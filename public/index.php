<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\DefaultController;
use App\Core\Request;

$request = Request::createFromGlobals();

session_start();

$page = '';

if (!array_key_exists('page', $request->getGet())) {
    $page = 'home';
} else {
    $page = $request->getGet('page');
}
$controller = new DefaultController();
$response = null;

switch ($page) {
    case 'home':
        //TODO Appeler controller retournant le contenu de la homepage
        $response = $controller->home($request);
        break;
    case 'list':
        //TODO Appeler controller retournant le contenu de la liste des éléments
        $response = $controller->listArticles($request);
        break;
    default:
        $response = $controller->notFound();
        break;
}

echo $response;

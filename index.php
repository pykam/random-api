<?php

use App\Api\Controller;
use App\Api\Response;

require __DIR__ . '/vendor/autoload.php';

$path = NULL;
$query = NULL;

$uri = parse_url($_SERVER['REQUEST_URI']);


if (isset($uri['path'])) {
    $path = explode('/', $uri['path'])[1];
}

if (isset($uri['query'])) {
    $query = explode('=', $uri['query'])[1];
}

switch ($path) {

    case 'random':
        (new Controller())->digit();
        break;

    case 'get':

        if (!$query) {
            Response::notFound();
            exit;
        }

        (new Controller())->get(intval($query));
        break;
    
    default:
        Response::notFound();
        exit;
}
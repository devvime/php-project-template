<?php

use Modularis\Router;

$router = new Router();

$router->get('/', function ($request, $response) {
    $response->render('Hello World!');
});

$router->dispatch();
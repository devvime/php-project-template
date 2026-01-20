<?php

use ModPath\Router\Router;
use App\Controllers\ViewController;

$router = new Router();

$router->registerRoutes([
    ViewController::class,
]);

$router->dispatch();
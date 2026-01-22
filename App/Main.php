<?php

use ModPath\Router\Router;
use App\Controllers\ViewController;
use App\Controllers\AuthController;

$router = new Router();

$router->registerRoutes([
    ViewController::class,
    AuthController::class
]);

$router->dispatch();
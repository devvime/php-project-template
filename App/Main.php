<?php

use ModPath\Router\Router;
use App\Controllers\ViewController;
use App\Controllers\AppViewController;
use App\Controllers\AuthController;

$router = new Router();

$router->registerRoutes([
  ViewController::class,
  AuthController::class,
  AppViewController::class
]);

$router->dispatch();

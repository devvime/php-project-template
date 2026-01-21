<?php

use ModPath\Helpers\RateLimit;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

try {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2))->load();
} catch (\Exception $error) {
    error_log(".env not found");
    echo json_encode(["error" => ".env not found"]);
    exit;
}

$_ENV['VIEWS_DIR'] = dirname(__DIR__, 2) . "/{$_ENV['VIEWS_DIR']}/";

if (!RateLimit::execute(host: $_ENV['REDIS_HOST'], port: $_ENV['REDIS_PORT'], maxRequests: 15)) {
    exit;
}

session_set_cookie_params([
    'lifetime' => 0,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();
session_regenerate_id(true);
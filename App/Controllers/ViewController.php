<?php

namespace App\Controllers;

use ModPath\Attribute\Route;

class ViewController
{

    #[Route(path: '', method: 'GET')]
    public function index($request, $response)
    {
        $response->render('layout/header', []);
        $response->render('home', [
            'message' => 'Hello from ViewController!'
        ]);
        $response->render('layout/footer', []);
    }
}

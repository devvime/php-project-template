<?php

namespace App\Controllers;

class ViewController
{
    public function index($request, $response)
    {
        $response->render('home');
    }
}
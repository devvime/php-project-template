<?php

namespace App\Controllers;

use ModPath\Attribute\Route;
use ModPath\Http\Response;

class ViewController
{
  public function __construct(private Response $response)
  {
    $this->response->render('layout/header', []);
  }

  #[Route(path: '', method: 'GET')]
  public function index($request, $response)
  {
    $response->render('pages/home', [
      'message' => 'Hello from ViewController!'
    ]);
  }

  #[Route(path: '/login', method: 'GET')]
  public function login($request, $response)
  {
    $response->render('pages/auth/login', []);
  }

  public function __destruct()
  {
    $this->response->render('layout/footer', []);
  }
}

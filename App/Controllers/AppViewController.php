<?php

namespace App\Controllers;

use App\Middlewares\Auth;
use ModPath\Attribute\Controller;
use ModPath\Attribute\Route;
use ModPath\Http\Response;

#[Controller(path: '/app', middleware: [Auth::class])]
class AppViewController
{
  public function __construct(private Response $response)
  {
    $this->response->render('layout/header', []);
  }

  #[Route(path: '', method: 'GET')]
  public function index($request, $response)
  {
    $response->render('pages/app/home', [
      'message' => 'Hello from DashboardViewController!'
    ]);
  }

  public function __destruct()
  {
    $this->response->render('layout/footer', []);
  }
}

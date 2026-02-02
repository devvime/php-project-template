<?php

namespace App\Controllers;

use ModPath\Attribute\Route;
use ModPath\Attribute\Controller;
use App\UseCases\Auth\Login;
use App\UseCases\Auth\Register;

#[Controller(path: '/auth')]
class AuthController
{
  public function __construct(
    protected Login $login,
    protected Register $register
  ) {}

  #[Route(path: '/login', method: 'POST')]
  public function login($request, $response)
  {
    $result = $this->login->execute((array)$request->body);
    return $response->json($result);
  }

  #[Route(path: '/logout', method: 'GET')]
  public function logout($request, $response)
  {
    $result = $this->login->logout();
    Header('location: /login');
  }

  #[Route(path: '/register', method: 'POST')]
  public function register($request, $response)
  {
    $result = $this->register->execute($request->body);
    return $response->json($result);
  }
}

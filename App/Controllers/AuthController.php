<?php

namespace App\Controllers;

use ModPath\Attribute\Route;
use ModPath\Attribute\Controller;
use ModPath\Attribute\Dto;
use App\UseCases\Auth\Login;
use App\UseCases\Auth\RecoverPassword;
use App\UseCases\Auth\Register;
use App\Validators\Auth\AuthDTO;
use App\Validators\Auth\RecoverPasswordDTO;
use App\Validators\Auth\RegisterDTO;

#[Controller(path: '/auth')]
class AuthController
{
  public function __construct(
    protected Login $login,
    protected Register $register,
    protected RecoverPassword $recoverPassword
  ) {}

  #[Route(path: '/login', method: 'POST')]
  #[Dto(AuthDTO::class)]
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
  #[Dto(RegisterDTO::class)]
  public function register($request, $response)
  {
    $result = $this->register->execute($request->body);
    return $response->json($result);
  }

  #[Route(path: '/recover-password', method: 'POST')]
  #[Dto(RecoverPasswordDTO::class)]
  public function recover_password($request, $response)
  {
    $result = $this->recoverPassword->execute($request->body->email);
    return $response->json($result);
  }
}

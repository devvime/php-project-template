<?php

namespace App\UseCases\Auth;

use App\Models\User;
use App\UseCases\User\SendActivationEmail;
use DomainException;
use ModPath\Helpers\Token;

class Login
{
  public function __construct(
    protected User $user,
    protected SendActivationEmail $sendActivationEmail
  ) {}

  public function execute(array $data)
  {
    try {
      $user = $this->user->find('*', [
        "email" => $data["email"]
      ]);
      if (!$user) {
        return [
          "error" => true,
          "type" => "error",
          "status" => 401,
          "message" => "Email or password incorrect."
        ];
      }
      if (!$user['active']) {
        $this->sendActivationEmail->execute($user);
        return [
          "error" => true,
          "type" => "warning",
          "status" => 301,
          "message" => "User is not active, access your email {$data['email']} and active your account."
        ];
      }
      if (password_verify(
        $data['password'],
        $user['password']
      )) {
        $token = Token::encode([
          "user_id" => $user['id'],
          "user_name" => $user['name'],
          "user_email" => $user['email']
        ]);
        $_SESSION['user'] = $token;
        return [
          "success" => true,
          "message" => "Login successfully!"
        ];
      }
    } catch (DomainException $error) {
      throw new DomainException($error);
    }
  }

  public function logout()
  {
    unset($_SESSION['user']);
    session_destroy();
    return [
      "success" => true,
      "message" => "Logout successfully"
    ];
  }
}

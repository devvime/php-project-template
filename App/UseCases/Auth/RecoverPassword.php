<?php

namespace App\UseCases\Auth;

class RecoverPassword
{
  public function execute(string $email)
  {
    return [
      "success" => true,
      "message" => "Password recovery email sent to the following email address: {$email}",
    ];
  }
}

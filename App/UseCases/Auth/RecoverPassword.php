<?php

namespace App\UseCases\Auth;

use App\Models\PasswordRecoveryTokens;
use App\Models\User;
use App\UseCases\Auth\Emails\SendRecoverPasswordEmail;
use DomainException;
use ModPath\Helpers\Token;

class RecoverPassword
{
  public function __construct(
    protected User $user,
    protected PasswordRecoveryTokens $passwordRecoveryTokens,
    protected SendRecoverPasswordEmail $sendRecoverPasswordEmail
  ) {}

  public function execute(string $email)
  {
    try {
      $user = $this->user->find('*', ["email" => $email]);
      if (!$user) {
        return [
          "error" => true,
          "type" => "error",
          "status" => 401,
          "message" => "Check your e-mail."
        ];
      }
      $token = Token::encode([
        "user_name" => $user['name'],
        "user_email" => $user['email']
      ]);
      $this->passwordRecoveryTokens->create([
        "user_id" => $user["id"],
        "token" => $token,
        "valid" => true
      ]);
      $this->sendRecoverPasswordEmail->execute($user, $token);
      return [
        "success" => true,
        "message" => "Password recovery email sent to the following email address: {$email}",
      ];
    } catch (DomainException $error) {
      throw new DomainException($error);
    }
  }
}

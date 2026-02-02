<?php

namespace App\UseCases\User;

use DomainException;
use Error;
use ModPath\Helpers\Mailer;
use ModPath\Helpers\Token;
use ModPath\Helpers\View;

class SendActivationEmail
{
  public function __construct(
    private Mailer $mailer = new Mailer()
  ) {}

  public function execute(array $user)
  {
    try {
      $token = $token = Token::encode([
        "user_name" => $user['name'],
        "user_email" => $user['email']
      ]);
      $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https" : "http";
      $host = $_SERVER['HTTP_HOST'];
      $this->mailer->send([
        "title" => "Welcome {$user['name']}!",
        "subject" => "Active your account",
        "altbody" => "Welcome to app {$user['name']}!",
        "msgHTML" => View::get('email/active-account', [
          "link" => "{$protocol}://{$host}/account/active/{$token}",
          "name" => $user['name']
        ]),
        "recipients" => [
          ["name" => $user['name'], "email" => $user['email']]
        ]
      ]);
      return true;
    } catch (DomainException $error) {
      throw new Error($error);
    }
  }
}

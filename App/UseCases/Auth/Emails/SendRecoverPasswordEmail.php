<?php

namespace App\UseCases\Auth\Emails;

use DomainException;
use Error;
use ModPath\Helpers\Mailer;
use ModPath\Helpers\View;

class SendRecoverPasswordEmail
{
  public function __construct(
    private Mailer $mailer = new Mailer()
  ) {}

  public function execute(array $user, $token)
  {
    try {
      $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https" : "http";
      $host = $_SERVER['HTTP_HOST'];
      $this->mailer->send([
        "title" => "Hello {$user['name']}!",
        "subject" => "Recover your password",
        "altbody" => "Hello {$user['name']}, follow these steps to recover your password.",
        "msgHTML" => View::get('email/recover-password', [
          "link" => "{$protocol}://{$host}/auth/recover-password/{$token}",
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

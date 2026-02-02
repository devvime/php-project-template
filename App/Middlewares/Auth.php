<?php

namespace App\Middlewares;

use ModPath\Helpers\Token;

class Auth
{
  public function handle()
  {
    if (
      isset($_SESSION['user']) &&
      Token::decode($_SESSION['user'])
    ) {
      return true;
    } else {
      return Header('location: /login');
    }
  }
}

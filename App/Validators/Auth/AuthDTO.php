<?php

namespace App\Validators\Auth;

use ModPath\Dto\Dto;

class AuthDTO extends Dto
{
  public array $allowed = ['email', 'password'];
  public array $rules = [
    'email' => ['required', 'email'],
    'password' => ['required']
  ];
}

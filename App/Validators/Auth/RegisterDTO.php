<?php

namespace App\Validators\Auth;

use ModPath\Dto\Dto;

class RegisterDTO extends Dto
{
  public array $allowed = ['name', 'email', 'password'];
  public array $rules = [
    'name' => ['required'],
    'email' => ['required', 'email'],
    'password' => ['required']
  ];
}

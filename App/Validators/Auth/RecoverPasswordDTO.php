<?php

namespace App\Validators\Auth;

use ModPath\Dto\Dto;

class RecoverPasswordDTO extends Dto
{
  public array $allowed = ['email'];
  public array $rules = [
    'email' => ['required', 'email']
  ];
}

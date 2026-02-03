<?php

namespace App\Validators\User;

use ModPath\Dto\Dto;

class UpdateDTO extends Dto
{
  public array $allowed = ['name', 'email', 'password', 'avatar'];
  public array $rules = [
    'email' => ['email']
  ];
}

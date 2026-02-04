<?php

namespace App\Models;

use ModPath\Helpers\Repository;

class PasswordRecoveryTokens extends Repository
{

  public string $table = 'password_recovery_tokens';
  public array $fields = [
    'id',
    'user_id',
    'token',
    'valid',
    'created_at',
    'updated_at'
  ];
}

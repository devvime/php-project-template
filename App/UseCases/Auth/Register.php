<?php

namespace App\UseCases\Auth;

use DomainException;
use App\Models\User;
use App\UseCases\User\SendActivationEmail;

class Register
{
    public function __construct(
        protected User $user,
        protected SendActivationEmail $sendActivationEmail
    ) {
    }

    public function execute($data)
    {
        try {
            $password = password_hash($data->password, PASSWORD_DEFAULT);
            $user = [
                "name" => $data->name,
                "email" => $data->email,
                "password" => $password
            ];
            $this->user->create($user);
            $this->sendActivationEmail->execute($user);
            return [
                "success" => true,
                "message" => "User registered succesfull!"
            ];
        } catch (DomainException $error) {
            throw new DomainException($error);
        }
    }
}
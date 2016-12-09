<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface {

    public function findByUsernameOrCreate( $userData )
    {
        return User::firstOrCreate([
           'name' => $userData->name,
           'email' => $userData->email,
        ]);
    }
    
}
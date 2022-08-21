<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getDoctor()
    {
        return $this->user->getDoctor();
    }
    
    public function login($request)
    {
        return $this->user->login($request);
    }

}

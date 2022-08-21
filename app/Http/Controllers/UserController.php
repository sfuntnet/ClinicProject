<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function login(Request $request)
    {
        return $this->user->login($request);
    }
}

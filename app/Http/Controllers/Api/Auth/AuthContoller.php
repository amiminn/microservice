<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthContoller extends Controller
{
    public function login(Request $request)
    {
        return AuthService::login($request);
    }

    public function register(Request $request)
    {
        return AuthService::register($request);
    }

    public function confirm($token)
    {
        return AuthService::confirm($token);
    }

    public function logout(Request $request)
    {
        return AuthService::logout($request);
    }
}

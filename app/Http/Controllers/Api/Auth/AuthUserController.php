<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\UserAuth;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function updateProfile(Request $request)
    {
        return UserAuth::updateAuth($request);
    }

    public function updateEmail(Request $request)
    {
        return UserAuth::updateEmail($request);
    }

    public function updatePassword(Request $request)
    {
        return UserAuth::updatePassword($request);
    }
}

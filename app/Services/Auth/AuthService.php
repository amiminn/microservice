<?php

namespace App\Services\Auth;

use App\Models\UserModel;
use App\Services\Response;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login($request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'isActive' => 1])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return Response::data([
                "user" => $user,
                "token" => $token
            ]);
        }
        return Response::failed("Oops, sepertinya ada kesalahan username atau password.");
    }

    public static function register($request)
    {
        try {
            UserModel::create([
                "name" => $request["name"],
                "username" => $request["username"],
                "password" => $request["password"],
            ]);

            return Response::success("register telah berhasil.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function confirm($token)
    {
        try {
            UserModel::where('token', $token)->update(["isActive" => 1]);
            return Response::success("akun telah aktif.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function logout($request)
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        // Auth::logout();
        return Response::failed('Berhasil logout.');
    }

    public static function resetPassword($request)
    {
        try {
            // send email with token
            return Response::success("silahkan cek email untuk mereset ulang password.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function ubahPassword($request)
    {
        try {
            // ubah password baru
            UserModel::where("id", Auth::user()->id)->update([
                "password" => $request["password"]
            ]);
            return Response::success("password baru berhasil diterapkan.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }
}

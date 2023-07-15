<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Response;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login($request)
    {
        try {
            if (Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'isActive' => 1])) {
                $user = Auth::user();
                $token = $user->createToken('authToken')->accessToken;

                session(['token' => $token]);
                // return $token;
                return Response::success("login berhasil.");
            }

            return Response::failed("Oops, ada kesalahan username atau password.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function register($request)
    {
        try {
            User::create([
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
            User::where('token', $token)->update(["isActive" => 1]);
            return Response::success("akun telah aktif.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function logout()
    {
        try {
            Auth::user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        } catch (\Throwable $th) {
        }
        Auth::logout();
        return redirect()->to("login");
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
            User::where("id", Auth::user()->id)->update([
                "password" => $request["password"]
            ]);
            return Response::success("password baru berhasil diterapkan.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }
}

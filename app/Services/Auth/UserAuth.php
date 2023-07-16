<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuth
{
    public static function updateAuth($request)
    {
        try {
            User::find(Response::user()->id)->update([
                "name" => $request["name"]
            ]);
            return Response::success("profile berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::failed("Oops, sepertinya ada kesalahan server.");
        }
    }
    public static function updateAvatar($request)
    {
        // code
    }

    public static function updatePassword($request)
    {
        try {
            if ($request["password"] != $request["password_confirmation"]) {
                return Response::failed("Oops, password konfirmasi tidak tepat.");
            }

            if (!Hash::check($request["password_lama"], auth()->user()->password)) {
                return Response::failed("password salah.");
            }

            User::find(Response::user()->id)->update([
                "password" => $request["password"]
            ]);
            return Response::success("password berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::failed("Oops, sepertinya ada kesalahan server.");
        }
    }

    public static function updateEmail($request)
    {
        try {
            User::find(Response::user()->id)->update([
                "email" => $request["email"]
            ]);
            return Response::success("email berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::failed("Oops, sepertinya ada kesalahan server.");
            // return Response::failed($th->getMessage());
        }
    }
}

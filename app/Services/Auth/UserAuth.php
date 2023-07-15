<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Response;
use Illuminate\Support\Facades\Auth;

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
        // code
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

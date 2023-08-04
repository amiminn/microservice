<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\Response;

class UserService
{
    public static function index()
    {
        return User::latest()->paginate(5);
    }

    public static function store($request)
    {
        try {
            if (User::where("email", $request["email"])->count() > 0) {
                return Response::failed("Oops, email telah digunakan.");
            }

            if (User::where("username", $request["username"])->count() > 0) {
                return Response::failed("Oops, username telah digunakan.");
            }

            if ($request["password"] != $request["password_confirmation"]) {
                return Response::failed("Oops, password konfirmasi tidak tepat.");
            }

            User::create($request->except(['password_confirmation']));
            return Response::success("user baru berhasil dibuat.");
        } catch (\Throwable $th) {
            return Response::error(500);
        }
    }

    public static function show($id)
    {
        try {
            return User::findOrFail($id);
        } catch (\Throwable $th) {
            return Response::failed("data tidak ditemukan.");
        }
    }

    public static function update($request, $id)
    {
        try {
            User::where('id', $id)->update($request);
            return Response::success("data user berhasil terupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public static function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return Response::success("data user berhasil terhapus.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public static function activate($id)
    {
        try {
            User::findOrFail($id)->active()->save();
            return Response::success("status user berhasil diubah.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }
}

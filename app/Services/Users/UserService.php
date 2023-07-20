<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\Response;

class UserService
{
    public static function index()
    {
        return User::paginate(5);
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
            return Response::failed($th->getMessage());
            return Response::failed("Oops, sepertinya ada kesalahan server.");
        }
    }

    public static function show($id)
    {
        return User::find($id);
    }

    public static function update($request, $id)
    {
        try {
            User::where('id', $id)->update($request);
            return Response::success("data user berhasil terupdate.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function destroy($id)
    {
        User::where('id', $id)->delete();
        return Response::success("data user berhasil terhapus.");
    }

    public static function activate($id)
    {
        $user = User::find($id);
        $user->active();
        $user->save();

        return Response::success("status user berhasil diubah.");
    }
}

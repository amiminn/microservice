<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\Response;

class UserService
{
    public static function index()
    {
        return Response::data(User::get());
    }

    public static function store($request)
    {
        try {
            User::create($request);
            return Response::success("user baru berhasil dibuat.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function show($id)
    {
        return Response::data(User::where('id', $id)->first());
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
        $user = User::where('id', $id)->first();
        $user->active();
        $user->save();

        return Response::success("status user berhasil diubah.");
    }
}

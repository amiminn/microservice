<?php

namespace App\Services\Users;

use App\Models\UserModel;
use App\Services\Response;

class UserService
{
    public static function index()
    {
        return Response::data(UserModel::get());
    }

    public static function store($request)
    {
        try {
            UserModel::create($request);
            return Response::success("user baru berhasil dibuat.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function show($id)
    {
        return Response::data(UserModel::where('id', $id)->first());
    }

    public static function update($request, $id)
    {
        try {
            UserModel::where('id', $id)->update($request);
            return Response::success("data user berhasil terupdate.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }

    public static function destroy($id)
    {
        UserModel::where('id', $id)->delete();
        return Response::success("data user berhasil terhapus.");
    }

    public static function activate($id)
    {
        $user = UserModel::where('id', $id)->first();
        $user->active();
        $user->save();

        return Response::success("status user berhasil diubah.");
    }
}

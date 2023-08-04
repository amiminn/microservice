<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SettingModel;
use App\Services\Response;
use Illuminate\Http\Request;

class SettingApp extends Controller
{
    public function index()
    {
        return SettingModel::first();
    }

    public function store(Request $request)
    {
        try {
            SettingModel::whereId(1)->update([
                "nama_app" => $request->nama_app,
                "email" => $request->email,
                "ip" => $request->ip,
                "detail" => $request->detail,
                "map" => $request->map,
            ]);

            return Response::success("App berhasil diperbarui.");
        } catch (\Throwable $th) {
            return Response::failed($th->getMessage());
        }
    }
}

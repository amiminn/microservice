<?php

namespace App\Services\Secret;

use App\Models\Secret\ClientModel;
use App\Services\Response;
use Illuminate\Http\Request;

class ClientService
{
    public function index()
    {
        return ClientModel::paginate(5);
    }

    public function store(Request $request)
    {
        try {
            $create = ClientModel::create(["name" => $request["name"]]);
            return response()->json([
                "success" => true,
                "data" => $create,
                "msg" => "sercret client baru berhasil ditambahkan."
            ]);
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function show($id)
    {
        return ClientModel::find($id);
    }

    public function update(Request $request, $id)
    {
        try {
            ClientModel::find($id)->update(["name" => $request["name"]]);
            return Response::success("sercret client berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function destroy($id)
    {
        try {
            ClientModel::whereId($id)->delete();
            return Response::success("sercret client berhasil dihapus.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function updateClientSecret($id)
    {
        try {
            ClientModel::find($id)->updateClientSecret();
            return Response::success("client-secret berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function updateClientStatus($id)
    {
        try {
            ClientModel::find($id)->status();
            return Response::success("status sercret client berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }
}

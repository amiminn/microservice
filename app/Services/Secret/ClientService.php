<?php

namespace App\Services\Secret;

use App\Models\Secret\ClientModel;
use App\Services\Response;
use Illuminate\Http\Request;

class ClientService
{
    public function index()
    {
        return ClientModel::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        try {
            $create = ClientModel::create(["name" => $request["name"]]);
            return response()->json([
                "success" => true,
                "data" => $create,
                "msg" => "client-key baru berhasil ditambahkan."
            ]);
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function show($id)
    {
        try {
            return ClientModel::findOrFail($id);
        } catch (\Throwable $th) {
            return Response::failed("data tidak ditemukan.");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            ClientModel::find($id)->update(["name" => $request["name"]]);
            return Response::success("client-key berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function destroy($id)
    {
        try {
            ClientModel::findOrFail($id)->delete();
            return Response::success("client-key berhasil dihapus.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function updateClientSecret($id)
    {
        try {
            ClientModel::find($id)->updateClientSecret()->save();
            return Response::success("client-secret berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }

    public function updateClientStatus($id)
    {
        try {
            ClientModel::find($id)->status()->save();
            return Response::success("status client-key berhasil diupdate.");
        } catch (\Throwable $th) {
            return Response::error();
        }
    }
}

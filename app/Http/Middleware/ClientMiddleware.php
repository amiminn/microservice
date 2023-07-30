<?php

namespace App\Http\Middleware;

use App\Models\Secret\ClientModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $client_id = $request->header('client-id');
        $client_secret = $request->header('client-secret');

        $client = ClientModel::where(['client_id' => $client_id, 'client_secret' => $client_secret]);
        if ($client->count() > 0) {
            if ($client->first()->status == 1) {
                $request->merge(["client" => $client->first()]);
                return $next($request);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'status client-key non-active.'
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg' => 'client-key tidak ditemukan.'
            ], 400);
        }
    }
}

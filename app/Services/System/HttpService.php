<?php

namespace App\Services\System;

use Illuminate\Support\Facades\Http;

class HttpService
{
    private static $timeout = 60;

    public static function get($url, $header = [])
    {
        $response = Http::timeout(self::$timeout)->withHeaders($header)->get($url);
        if ($response->status() == 200) {
            return response($response->json());
        } else {
            return response($response->json(), $response->status());
        }
    }

    public static function post($url, $data = [], $header = [])
    {
        $response = Http::timeout(self::$timeout)->withHeaders($header)->post($url, $data);
        if ($response->status() == 200) {
            return response($response->json());
        } else {
            return response($response->json(), $response->status());
        }
    }
}

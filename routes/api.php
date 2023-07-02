<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::post('/', function (Request $request) {
    return url()->current();
});

Route::post('/del', function (Request $request) {
    return Cache::get('bio');
});

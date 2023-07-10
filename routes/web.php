<?php

use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', function (Request $request) {
    return AuthService::login($request->all());
})->name('to-login');

Route::get("logout", function () {
    return AuthService::logout();
});

Route::get('{path}', function () {
    return view('layouts.app');
})->where('path', '(.*)');

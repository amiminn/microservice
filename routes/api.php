<?php

use App\Http\Controllers\Api\Auth\AuthContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthContoller::class, 'login']);
    // Route::post('register', [AuthContoller::class, 'register']);
    Route::get('confirm={token}', [AuthContoller::class, 'confirm']);
    Route::post('logout', [AuthContoller::class, 'logout']);
});

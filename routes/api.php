<?php

use App\Http\Controllers\Api\Auth\AuthContoller;
use App\Http\Controllers\Api\Auth\AuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthContoller::class, 'login']);
    // Route::post('register', [AuthContoller::class, 'register']);
    Route::get('confirm={token}', [AuthContoller::class, 'confirm']);
    Route::post('logout', [AuthContoller::class, 'logout']);
});

Route::post("user", function () {
    return auth()->user();
})->middleware(['auth:api']);

Route::controller(AuthUserController::class)->middleware(["auth:api"])->group(function () {
    Route::post("update-profile", "updateProfile");
    Route::post("update-email", "updateEmail");
});

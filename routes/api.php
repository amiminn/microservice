<?php

use App\Http\Controllers\Api\Auth\AuthContoller;
use App\Http\Controllers\Api\Auth\AuthUserController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\SettingApp;
use App\Http\Controllers\Api\Users\UserController;
use App\Services\Secret\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('access-denied', function () {
    return response()->json(["success" => false, "msg" => "access denied."], 400);
})->name("login");

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthContoller::class, 'login']);
    // Route::post('register', [AuthContoller::class, 'register']);
    Route::get('confirm={token}', [AuthContoller::class, 'confirm']);
    Route::post('logout', [AuthContoller::class, 'logout']);
});

Route::middleware(['auth:api'])->group(function () {
    // user login
    Route::post("user", function () {
        return auth()->user();
    });

    Route::get("dashboard", [DashboardController::class, "index"]);

    Route::controller(AuthUserController::class)->group(function () {
        Route::post("update-profile", "updateProfile");
        Route::post("update-email", "updateEmail");
        Route::post("update-password", "updatePassword");
    });

    // manage users
    Route::prefix("users")->group(function () {
        Route::get("status/{id}", [AuthUserController::class, "updateStatus"]);
    });

    // manage more info
    Route::apiResources([
        "client" => ClientService::class,
        "users" => UserController::class
    ]);

    Route::apiResource("setting", SettingApp::class)->only(['store', 'index']);

    Route::prefix("client")->group(function () {
        Route::get('reset-client/{id}', [ClientService::class, 'updateClientSecret']);
        Route::get('status-client/{id}', [ClientService::class, 'updateClientStatus']);
    });
});

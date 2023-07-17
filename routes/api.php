<?php

use App\Http\Controllers\Api\Auth\AuthContoller;
use App\Http\Controllers\Api\Auth\AuthUserController;
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
    Route::post("user", function () {
        return auth()->user();
    });

    Route::controller(AuthUserController::class)->group(function () {
        Route::post("update-profile", "updateProfile");
        Route::post("update-email", "updateEmail");
        Route::post("update-password", "updatePassword");
    });

    Route::prefix("secret")->group(function () {
        Route::apiResources([
            "client" => ClientService::class
        ]);
        Route::get('reset-client/{id}', [ClientService::class, 'updateClientSecret']);
        Route::get('status-client/{id}', [ClientService::class, 'updateClientStatus']);
    });
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['client'])->group(function () {
    Route::post("amiminn", function (Request $request) {
        return $request->all();
    });
});

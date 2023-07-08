<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', function () {
    return view('layouts.login');
})->name('login');

Route::post('login', function (Request $request) {
    return $request;
})->name('to-login');


// Route::middleware(['auth'])->group(function () {
Route::get('{path}', function () {
    return view('layouts.app');
})->where('path', '(.*)');
// });

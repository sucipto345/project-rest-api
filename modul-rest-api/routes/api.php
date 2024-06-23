<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->namespace('App\Http\Controllers\Api\Auth')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', 'SocietiesController@login');
        Route::post('logout', 'SocietiesController@logout');
    });
});

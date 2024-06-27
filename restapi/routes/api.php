<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\RequestController;
use App\Http\Controllers\api\JobVacancyController;

Route::post('/v1/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/auth/logout', [AuthController::class, 'logout']);
    Route::apiResource('/v1/validations', RequestController::class)->middleware('auth:sanctum');
    Route::get('/v1/job_vacancies', [JobVacancyController::class, 'index'])->middleware('auth:sanctum');
    Route::get('/v1/job_vacancies/{job_category_id}', [JobVacancyController::class, 'getByCategory'])->middleware('auth:sanctum');
    // Route::post('/v1/applications', []);
});

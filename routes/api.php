<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}', [UserController::class, 'show']);
*/

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum', 'user.type:manager'])->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/companies', CompanyController::class);
});

<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\ApiTaskController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('tasks', ApiTaskController::class);
});


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::prefix('auth')->group(function () {
    //Registration
    Route::post('/register', [RegisteredUserController::class, 'register']);

    //Login
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);

    //Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->middleware('auth:sanctum');
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PartnerController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('partners', [PartnerController::class, 'index']);
Route::get('hello', function () {
    return response()->json(['message' => 'Hello world']);
});

Route::middleware('auth:api')->group(function () {
    // Routes for all users connected
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::post('partner', [PartnerController::class, 'store']);
    Route::post('assign/partner/{partnerId}', [PartnerController::class, 'assignUserToPartner']);

    // Routes for only partners
    Route::middleware('role:partner')->prefix('partner')->group(function () {
        Route::get('hello', function () {
            return response()->json(['message' => 'Hello from partner route']);
        });
    });

    // Routes for only players
    Route::middleware('role:player')->prefix('player')->group(function () {
        Route::get('hello', function () {
            return response()->json(['message' => 'Hello from player route']);
        });
    });
});

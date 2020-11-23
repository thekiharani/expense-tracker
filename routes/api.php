<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')
    ->group(function () {
        Route::post('login', [App\Http\Controllers\Api\Auth\ApiAuthController::class, 'login'])->name('login');
        Route::post('register', [App\Http\Controllers\Api\Auth\ApiAuthController::class, 'register'])->name('register');
    });

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('logout', [App\Http\Controllers\Api\Auth\ApiAuthController::class, 'logout'])->name('logout');
        Route::get('user', [App\Http\Controllers\Api\Auth\ApiAuthController::class, 'user'])->name('user');
        Route::patch('user/update', [App\Http\Controllers\Api\Auth\ApiAuthController::class, 'update'])->name('user_update');
        Route::get('admin', function () {
            return response(['message' => 'Admin Section']);
        })->middleware('user_type:admin');
        Route::get('photographer', function () {
            return response(['message' => 'Photographer Section']);
        })->middleware('user_type:photographer');
        Route::get('customer', function () {
            return response(['message' => 'Customer Section']);
        })->middleware('user_type:customer');
    });

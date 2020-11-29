<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('charts', [App\Http\Controllers\HomeController::class, 'charts'])->name('charts');

Route::get('change_password', [App\Http\Controllers\Auth\PasswordController::class, 'get'])
        ->name('change_password');
Route::patch('change_password', [App\Http\Controllers\Auth\PasswordController::class, 'patch'])
        ->name('change_password');

Route::resource('income', App\Http\Controllers\IncomeController::class);
Route::resource('expense', App\Http\Controllers\ExpenseController::class);
Route::resource('wish_list', App\Http\Controllers\WishController::class)
    ->parameters(['wish_list' => 'wish']);

Route::prefix('manage')->name('manage.')->group(function () {
    Route::resource('admins', App\Http\Controllers\Manage\AdminController::class);
    Route::resource('suppliers', App\Http\Controllers\Manage\SupplierController::class);
});

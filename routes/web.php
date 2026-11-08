<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, "showLogin"])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {

#bisa diakses admin dan petugas
    Route::middleware('role:admin,petugas')->group(function () {
        Route::resource('books', BookController::class);

        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/members', [MemberController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

    // Fitur yang HANYA boleh diakses oleh Admin
        Route::middleware('can:manage-users')->group(function () {
            Route::resource('users', UserController::class);
        });
});

Route::get('/', function () {
    return redirect('/dashboard');
});

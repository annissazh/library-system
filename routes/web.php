<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {

    // Bisa diakses admin dan petugas
    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('books', BookController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('members', MemberController::class);
        Route::resource('borrowings', BorrowingController::class);
        Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
    });

    // Fitur yang HANYA boleh diakses oleh Admin
    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });
});

Route::get('/', function () {
    return redirect('/dashboard');
});
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Laravel\Breeze\Http\Controllers\AuthenticatedSessionController;
use Laravel\Breeze\Http\Controllers\RegisteredUserController;
use Laravel\Breeze\Http\Controllers\PasswordResetLinkController;
use Laravel\Breeze\Http\Controllers\PasswordUpdateController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordUpdateController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [PasswordUpdateController::class, 'store'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    // Your other routes here
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('/users', App\Http\Controllers\UsersController::class);
    Route::resource('/roles', App\Http\Controllers\RolesController::class);
    Route::resource('/permissions', App\Http\Controllers\PermissionsController::class);

    Route::prefix('admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
        Route::put('/profile/edit/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/change_pass/{id}', [ProfileController::class, 'changePass'])->name('profile.change_pass');
        Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/user/list', [AdminController::class, 'index'])->name('user.index');
        Route::get('/role/list', [RoleController::class, 'index'])->name('role.index');
        // ...

    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';

<?php

// use Modules\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/auths', [AuthController::class, 'index'])->name('auths.index');
// Route::get('/auths/create', [AuthController::class, 'create'])->name('auths.create');
// Route::post('/auths', [AuthController::class, 'store'])->name('auths.store');
// Route::get('/auths/{auth}', [AuthController::class, 'show'])->name('auths.show');
// Route::get('/auths/{auth}/edit', [AuthController::class, 'edit'])->name('auths.edit');
// Route::put('/auths/{auth}', [AuthController::class, 'update'])->name('auths.update');
// Route::delete('/auths/{auth}', [AuthController::class, 'destroy'])->name('auths.destroy');



use AppModules\Auth\Http\Controllers\AuthController;

Route::middleware(['web'])->group(function () {

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

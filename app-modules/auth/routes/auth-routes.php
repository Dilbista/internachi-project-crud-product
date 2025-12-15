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



use Modules\Auth\Http\Controllers\AuthController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('auths', AuthController::class)->names('auth');
});

// Modules/Auth/routes/web.php


Route::get('/register', [AuthController::class, 'show']);
Route::post('/register', [AuthController::class, 'store']);



// Route::get('/login', [AuthController::class, 'View_login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['web'])->group(function () {
Route::get('/login', [AuthController::class, 'View_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/dashboard', [AuthController::class, 'Dashboard'])->name('dashboard');
});

<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/account', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth', 'authAdmin' ])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

<?php

use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Usuários
Route::get('users-index', [UserController::class, 'index'])->name('users.index');
Route::get('users-show/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('users-create', [UserController::class, 'create'])->name('users.create');
Route::post('users-store', [UserController::class, 'store'])->name('users.store');

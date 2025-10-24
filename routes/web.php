<?php

use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('users-index', [UserController::class, 'index'])->name('users.index');

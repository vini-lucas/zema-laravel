<?php

use App\Http\Controllers\EnterprisesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Empresas
Route::get('/index-enterprise', [EnterprisesController::class, 'index'])->name('enterprises.index');
Route::get('/create-enterprise', [EnterprisesController::class, 'create'])->name('enterprises.create');
Route::post('/store-enterprise', [EnterprisesController::class, 'store'])->name('enterprises.store');

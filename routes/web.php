<?php

use App\Http\Controllers\EnterprisesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Empresas
Route::get('/index-enterprise', [EnterprisesController::class, 'index'])->name('enterprises.index');

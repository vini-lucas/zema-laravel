<?php

use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Usuários
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Listar registros
    Route::get('/create', [UserController::class, 'create'])->name('users.create'); // Carregar formulário cadastrar registro
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Cadastrar registro
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show'); // Vizualizar detalhes do registro
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Carregar formulário que edita o registro
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update'); // Editar o registro
    Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit-password'); // Carrega o formulário que edita a senha
    Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password'); // Edita a senha
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(); // Exclui o registro
});

// Empresas e produtos
Route::resources([
    'enterprises' => EnterpriseController::class,
    'products' => ProductController::class,
]);

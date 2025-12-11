<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditedRecordsController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\LevelAccessController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rotas restritas
Route::group(['middleware' => 'auth'], function () {

    // Perfil
    Route::get('/profile/{user}', [DashboardController::class, 'profile'])->name('profile')->middleware('permission:profile');
    Route::get('/profile/{user}/edit', [DashboardController::class, 'edit'])->name('profile.edit')->middleware('permission:profile.edit');
    Route::put('/profile/{user}', [DashboardController::class, 'update'])->name('profile.update')->middleware('permission:profile.update');
    Route::get('/profile/{user}/edit-password', [DashboardController::class, 'editPassword'])->name('profile.edit-password')->middleware('permission:profile.edit-password');
    Route::put('/profile/{user}/edit-password', [DashboardController::class, 'updatePassword'])->name('profile.update-password')->middleware('permission:profile.update-password');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard');

    // Histórico de edições
    Route::get('/edited-records/{table}/{register}', [EditedRecordsController::class, 'index'])->name('edited.records')->middleware('permission:edited.records');

    // Usuários
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('permission:users.index'); // Listar registros
        Route::post('/info-create', [UserController::class, 'infoCreate'])->name('users.info-create')->middleware('permission:users.info-create');
        Route::match(['get', 'post'], '/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:users.create'); // Carregar formulário cadastrar registro

        Route::get('/select-enterprise', [UserController::class, 'selectEnterprise'])->name('users.select-enterprise')->middleware('permission:users.select-enterprise');
        Route::post('/select-enterprise', [UserController::class, 'selectEnterpriseActive'])->name('users.select-enterprise-active')->middleware('permission:users.select-enterprise-active');

        Route::post('/', [UserController::class, 'store'])->name('users.store')->middleware('permission:users.store'); // Cadastrar registro
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:users.show'); // Vizualizar detalhes do registro
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:users.edit'); // Carregar formulário que edita o registro

        Route::get('/select-enterprise-update/{user}', [UserController::class, 'selectEnterpriseUpdate'])->name('users.select-enterprise-update')->middleware('permission:users.select-enterprise-update');
        Route::post('/select-enterprise-update/{user}', [UserController::class, 'selectEnterpriseActiveUpdate'])->name('users.select-active-update')->middleware('permission:users.select-active-update');
        
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:users.update'); // Editar o registro
        Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit-password')->middleware('permission:users.edit-password'); // Carrega o formulário que edita a senha
        Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password')->middleware('permission:users.update-password'); // Edita a senha
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:users.destroy'); // Exclui o registro
    });

    // Empresas, produtos, planos, filiais, níveis de acesso
    Route::resources([
        'enterprises' => EnterpriseController::class,
        'products' => ProductController::class,
        'flats' => FlatController::class,
        'branchs' => BranchController::class,
        'statuses' => StatusController::class,
        'levels_access' => LevelAccessController::class
    ]);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginProccess'])->name('login.proccess');

// Cadastrar no login
Route::get('/create-register', [LoginController::class, 'create'])->name('login.create');
Route::post('/create', [LoginController::class, 'store'])->name('login.store');

// Recuperar acesso
Route::get('/recover', [LoginController::class, 'recover'])->name('recover.create');
Route::post('/recover', [LoginController::class, 'storeRecover'])->name('storeRecover.create');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

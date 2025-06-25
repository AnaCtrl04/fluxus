<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\{
    ContaController,
    CategoriaController,
    TransacaoController,
    TransferenciaController,
    DashboardController,
};

// Redireciona "/" para login se não autenticado
Route::get('/', function () {
    return redirect()->route('login');
});

// ROTAS DE AUTENTICAÇÃO
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ROTAS PROTEGIDAS (apenas usuários logados acessam)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('contas', ContaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('transacoes', TransacaoController::class)->parameters([
        'transacoes' => 'transacao'
    ]);
    Route::resource('transferencias', TransferenciaController::class);
});

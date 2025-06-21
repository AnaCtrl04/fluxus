<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ContaController,
    CategoriaController,
    TransacaoController,
    TransferenciaController,
    DashboardController
};

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('contas', ContaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('transacoes', TransacaoController::class)->parameters([
    'transacoes' => 'transacao'
]);
Route::resource('transferencias', TransferenciaController::class);


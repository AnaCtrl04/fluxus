<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Transacao;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Soma de saldo inicial das contas
    $saldoContas = \App\Models\Conta::sum('saldo_inicial');

    // 🟢 Soma de Receitas
    $receitas = \App\Models\Transacao::whereHas('categoria', function ($query) {
        $query->where('tipo', 'receita');
    })->sum('valor');

    // 🔴 Soma de Despesas
    $despesas = \App\Models\Transacao::whereHas('categoria', function ($query) {
        $query->where('tipo', 'despesa');
    })->sum('valor');

    // ⚫ Saldo geral = saldo inicial + receitas - despesas
    // As transferências não entram no total geral, pois são movimentações internas
    $saldo = $saldoContas + $receitas - $despesas;

    // 🏦 Todas as contas com saldo individual calculado
    $contas = \App\Models\Conta::all()->map(function ($conta) {
        $conta->saldo_atual = $conta->calcularSaldo();
        return $conta;
    });

    return view('dashboard', compact('receitas', 'despesas', 'saldo', 'contas'));
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'tipo', 'saldo_inicial'];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }

    public function transferenciasOrigem()
    {
        return $this->hasMany(Transferencia::class, 'conta_origem_id');
    }

    public function transferenciasDestino()
    {
        return $this->hasMany(Transferencia::class, 'conta_destino_id');
    }

    public function calcularSaldo()
{
    // Saldo inicial
    $saldo = $this->saldo_inicial;

    // ➕ Soma das receitas
    $receitas = $this->transacoes()->whereHas('categoria', function($q) {
        $q->where('tipo', 'receita');
    })->sum('valor');

    // ➖ Soma das despesas
    $despesas = $this->transacoes()->whereHas('categoria', function($q) {
        $q->where('tipo', 'despesa');
    })->sum('valor');

    // 🔀 Transferências de saída (dinheiro que saiu desta conta)
    $transferenciasSaida = $this->transferenciasOrigem()->sum('valor');

    // 🔀 Transferências de entrada (dinheiro que entrou nesta conta)
    $transferenciasEntrada = $this->transferenciasDestino()->sum('valor');

    // 🧠 Cálculo final
    return $saldo + $receitas - $despesas - $transferenciasSaida + $transferenciasEntrada;
}

}


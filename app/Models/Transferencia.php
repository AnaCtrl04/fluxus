<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $fillable = ['conta_origem_id', 'conta_destino_id', 'valor', 'data', 'descricao'];

    public function contaOrigem()
    {
        return $this->belongsTo(Conta::class, 'conta_origem_id');
    }

    public function contaDestino()
    {
        return $this->belongsTo(Conta::class, 'conta_destino_id');
    }
}

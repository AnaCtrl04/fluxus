<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';
    protected $fillable = ['conta_id', 'categoria_id', 'descricao', 'valor', 'data'];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }

    public function categoria()
    {   
        return $this->belongsTo(Categoria::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

}

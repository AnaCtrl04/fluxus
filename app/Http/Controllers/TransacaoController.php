<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Conta;
use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::with('conta', 'categoria')->get();
        return view('transacoes.index', compact('transacoes'));
    }

    public function create()
    {
        $contas = Conta::all();
        $categorias = Categoria::all();
        return view('transacoes.create', compact('contas', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conta_id' => 'required|exists:contas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        Transacao::create($request->all());

        return redirect()->route('transacoes.index')->with('success', 'Transação criada com sucesso.');
    }

    public function edit(Transacao $transacao)
    {
        $contas = Conta::all();
        $categorias = Categoria::all();
        return view('transacoes.edit', compact('transacao', 'contas', 'categorias'));
    }



    public function update(Request $request, Transacao $transacao)
    {
        $request->validate([
            'conta_id' => 'required|exists:contas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        $transacao->update($request->all());

        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada com sucesso.');
    }

    public function destroy(Transacao $transacao)
    {
        $transacao->delete();

        return redirect()->route('transacoes.index')->with('success', 'Transação excluída com sucesso.');
    }
}

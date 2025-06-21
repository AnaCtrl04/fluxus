<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Transferencia;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    public function index()
    {
        $transferencias = Transferencia::with('contaOrigem', 'contaDestino')->get();
        return view('transferencias.index', compact('transferencias'));
    }

    public function create()
    {
        $contas = Conta::all();
        return view('transferencias.create', compact('contas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conta_origem_id' => 'required|exists:contas,id',
            'conta_destino_id' => 'required|exists:contas,id|different:conta_origem_id',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        Transferencia::create($request->all());

        return redirect()->route('transferencias.index')->with('success', 'Transferência realizada com sucesso.');
    }

    public function edit(Transferencia $transferencia)
    {
        $contas = Conta::all();
        return view('transferencias.edit', compact('transferencia', 'contas'));
    }

    public function update(Request $request, Transferencia $transferencia)
    {
        $request->validate([
            'conta_origem_id' => 'required|exists:contas,id',
            'conta_destino_id' => 'required|exists:contas,id|different:conta_origem_id',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $transferencia->update($request->all());

        return redirect()->route('transferencias.index')->with('success', 'Transferência atualizada com sucesso.');
    }

    public function destroy(Transferencia $transferencia)
    {
        $transferencia->delete();

        return redirect()->route('transferencias.index')->with('success', 'Transferência excluída com sucesso.');
    }
}

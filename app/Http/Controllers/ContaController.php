<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        $contas = Conta::all();
        return view('contas.index', compact('contas'));
    }

    public function create()
    {
        return view('contas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'saldo_inicial' => 'required|numeric',
        ]);

        Conta::create($request->all());

        return redirect()->route('contas.index')->with('success', 'Conta criada com sucesso.');
    }

    public function edit(Conta $conta)
    {
        return view('contas.edit', compact('conta'));
    }

    public function update(Request $request, Conta $conta)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'saldo_inicial' => 'required|numeric',
        ]);

        $conta->update($request->all());

        return redirect()->route('contas.index')->with('success', 'Conta atualizada com sucesso.');
    }

    public function destroy(Conta $conta)
    {
        $conta->delete();

        return redirect()->route('contas.index')->with('success', 'Conta excluída com sucesso.');
    }
}

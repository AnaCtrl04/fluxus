@extends('layouts.app')

@section('title', 'Editar Transação')

@section('content') 
<h1 class="text-3xl font-bold mb-6">Editar Transação</h1>

<form action="{{ route('transacoes.update', $transacao) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Descrição</label>
        <input type="text" name="descricao" value="{{ $transacao->descricao }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Conta</label>
        <select name="conta_id" class="w-full border rounded px-3 py-2" required>
            @foreach($contas as $conta)
                <option value="{{ $conta->id }}" @if($transacao->conta_id == $conta->id) selected @endif>{{ $conta->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Categoria</label>
        <select name="categoria_id" class="w-full border rounded px-3 py-2" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if($transacao->categoria_id == $categoria->id) selected @endif>
                    {{ $categoria->nome }} ({{ ucfirst($categoria->tipo) }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Valor</label>
        <input type="number" step="0.01" name="valor" value="{{ $transacao->valor }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Data</label>
        <input type="date" name="data" value="{{ $transacao->data }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('transacoes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

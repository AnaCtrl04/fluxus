@extends('layouts.app')

@section('title', 'Nova Transação')

@section('content')
<h1 class="text-3xl font-bold mb-6">Nova Transação</h1>

<form action="{{ route('transacoes.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">Descrição</label>
        <input type="text" name="descricao" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Conta</label>
        <select name="conta_id" class="w-full border rounded px-3 py-2" required>
            <option value="">Selecione...</option>
            @foreach($contas as $conta)
                <option value="{{ $conta->id }}">{{ $conta->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Categoria</label>
        <select name="categoria_id" class="w-full border rounded px-3 py-2" required>
            <option value="">Selecione...</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }} ({{ ucfirst($categoria->tipo) }})</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Valor</label>
        <input type="number" step="0.01" name="valor" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Data</label>
        <input type="date" name="data" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('transacoes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

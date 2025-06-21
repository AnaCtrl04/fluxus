@extends('layouts.app')

@section('title', 'Nova Conta')

@section('content')
<h1 class="text-3xl font-bold mb-6">Nova Conta</h1>

<form action="{{ route('contas.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">Nome</label>
        <input type="text" name="nome" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Tipo</label>
        <input type="text" name="tipo" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Saldo Inicial</label>
        <input type="number" step="0.01" name="saldo_inicial" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('contas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

@extends('layouts.app')

@section('title', 'Editar Conta')

@section('content')
<h1 class="text-3xl font-bold mb-6">Editar Conta</h1>

<form action="{{ route('contas.update', $conta) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Nome</label>
        <input type="text" name="nome" value="{{ $conta->nome }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Tipo</label>
        <input type="text" name="tipo" value="{{ $conta->tipo }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Saldo Inicial</label>
        <input type="number" step="0.01" name="saldo_inicial" value="{{ $conta->saldo_inicial }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('contas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

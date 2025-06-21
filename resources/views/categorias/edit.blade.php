@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<h1 class="text-3xl font-bold mb-6">Editar Categoria</h1>

<form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Nome</label>
        <input type="text" name="nome" value="{{ $categoria->nome }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Tipo</label>
        <select name="tipo" class="w-full border rounded px-3 py-2" required>
            <option value="">Selecione...</option>
            <option value="receita" @if($categoria->tipo == 'receita') selected @endif>Receita</option>
            <option value="despesa" @if($categoria->tipo == 'despesa') selected @endif>Despesa</option>
        </select>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

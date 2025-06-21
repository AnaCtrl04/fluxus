@extends('layouts.app')

@section('title', 'Editar Transferência')

@section('content')
<h1 class="text-3xl font-bold mb-6">Editar Transferência</h1>

<form action="{{ route('transferencias.update', $transferencia) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Conta de Origem</label>
        <select name="conta_origem_id" class="w-full border rounded px-3 py-2" required>
            @foreach($contas as $conta)
                <option value="{{ $conta->id }}" @if($transferencia->conta_origem_id == $conta->id) selected @endif>{{ $conta->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Conta de Destino</label>
        <select name="conta_destino_id" class="w-full border rounded px-3 py-2" required>
            @foreach($contas as $conta)
                <option value="{{ $conta->id }}" @if($transferencia->conta_destino_id == $conta->id) selected @endif>{{ $conta->nome }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Valor</label>
        <input type="number" step="0.01" name="valor" value="{{ $transferencia->valor }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Data</label>
        <input type="date" name="data" value="{{ $transferencia->data }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Descrição</label>
        <input type="text" name="descricao" value="{{ $transferencia->descricao }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('transferencias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>
</form>
@endsection

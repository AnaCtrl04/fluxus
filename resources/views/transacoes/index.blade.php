@extends('layouts.app')

@section('title', 'Transações')

@section('content')
<h1 class="text-3xl font-bold mb-6">Transações</h1>

<a href="{{ route('transacoes.create') }}" class="bg-red-700 text-white px-4 py-2 rounded">+ Nova Transação</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mt-4">
        {{ session('success') }}
    </div>
@endif

<table class="mt-6 w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Descrição</th>
            <th class="px-4 py-2">Conta</th>
            <th class="px-4 py-2">Categoria</th>
            <th class="px-4 py-2">Valor</th>
            <th class="px-4 py-2">Data</th>
            <th class="px-4 py-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transacoes as $transacao)
            <tr>
                <td class="border px-4 py-2">{{ $transacao->descricao }}</td>
                <td class="border px-4 py-2">{{ $transacao->conta->nome }}</td>
                <td class="border px-4 py-2">{{ $transacao->categoria->nome }}</td>
                <td class="border px-4 py-2">R$ {{ number_format($transacao->valor, 2, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ date('d/m/Y', strtotime($transacao->data)) }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('transacoes.edit', $transacao) }}" class="bg-yellow-500 px-3 py-1 rounded text-white">Editar</a>
                    <form action="{{ route('transacoes.destroy', $transacao) }}" method="POST" onsubmit="return confirm('Deseja excluir?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 px-3 py-1 rounded text-white">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

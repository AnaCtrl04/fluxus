@extends('layouts.app')

@section('title', 'Contas')

@section('content')
<h1 class="text-3xl font-bold mb-6">Contas</h1>

<a href="{{ route('contas.create') }}" class="bg-red-700 text-white px-4 py-2 rounded">+ Nova Conta</a>

@if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mt-4">
        {{ session('success') }}
    </div>
@endif

<table class="mt-6 w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Tipo</th>
            <th class="px-4 py-2">Saldo Inicial</th>
            <th class="px-4 py-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contas as $conta)
            <tr>
                <td class="border px-4 py-2">{{ $conta->nome }}</td>
                <td class="border px-4 py-2">{{ $conta->tipo }}</td>
                <td class="border px-4 py-2">R$ {{ number_format($conta->saldo_inicial, 2, ',', '.') }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('contas.edit', $conta) }}" class="bg-yellow-500 px-3 py-1 rounded text-white">Editar</a>
                    <form action="{{ route('contas.destroy', $conta) }}" method="POST" onsubmit="return confirm('Deseja excluir?')">
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

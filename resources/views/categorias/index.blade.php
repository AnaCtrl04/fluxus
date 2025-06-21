@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<h1 class="text-3xl font-bold mb-6">Categorias</h1>

<a href="{{ route('categorias.create') }}" class="bg-red-700 text-white px-4 py-2 rounded">+ Nova Categoria</a>

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
            <th class="px-4 py-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td class="border px-4 py-2">{{ $categoria->nome }}</td>
                <td class="border px-4 py-2">{{ ucfirst($categoria->tipo) }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('categorias.edit', $categoria) }}" class="bg-yellow-500 px-3 py-1 rounded text-white">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('Deseja excluir?')">
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

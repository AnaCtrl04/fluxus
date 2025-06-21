@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2 text-green-600">Receitas</h2>
        <p class="text-2xl font-bold">R$ {{ number_format($receitas, 2, ',', '.') }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2 text-red-600">Despesas</h2>
        <p class="text-2xl font-bold">R$ {{ number_format($despesas, 2, ',', '.') }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2 text-black">Saldo Geral</h2>
        <p class="text-2xl font-bold">R$ {{ number_format($saldo, 2, ',', '.') }}</p>
    </div>
</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Saldo por Conta</h2>
    <table class="w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Conta</th>
                <th class="px-4 py-2">Saldo Atual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contas as $conta)
                <tr>
                    <td class="border px-4 py-2">{{ $conta->nome }}</td>
                    <td class="border px-4 py-2">
                        R$ {{ number_format($conta->saldo_atual, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

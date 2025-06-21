<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fluxus - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-red-700 text-white min-h-screen">
        <div class="p-6 text-2xl font-bold">Fluxus</div>
        <nav class="flex flex-col gap-4 p-6">
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('contas.index') }}">💼 Contas</a>
            <a href="{{ route('categorias.index') }}">📂 Categorias</a>
            <a href="{{ route('transacoes.index') }}">💸 Transações</a>
            <a href="{{ route('transferencias.index') }}">🔀 Transferências</a>
        </nav>
    </aside>

    <!-- Conteúdo -->
    <main class="flex-1 p-8 bg-gray-100">
        @yield('content')
    </main>

</body>
</html>

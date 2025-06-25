<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Fluxus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-red-700">Fluxus - Login</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold">E-mail</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold">Senha</label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
            </div>

            <button type="submit" class="w-full bg-red-700 text-white py-2 rounded hover:bg-red-800">
                Entrar
            </button>

            <p class="text-sm text-center mt-4">
    Ainda não tem conta? <a href="{{ route('register') }}" class="text-red-700 underline">Cadastre-se</a>
</p>

        </form>
    </div>

</body>
</html>

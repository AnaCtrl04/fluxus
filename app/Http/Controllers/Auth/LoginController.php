<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Processa o login
     */
    public function login(Request $request)
    {
        // Valida os campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Credenciais extraídas do formulário
        $credentials = $request->only('email', 'password');

        // Tenta autenticar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Protege contra session fixation
            return redirect()->intended(route('dashboard'));
        }

        // Caso falhe, retorna com erro
        return back()->withErrors([
            'email' => 'E-mail ou senha inválidos.',
        ])->withInput($request->only('email'));
    }

    /**
     * Realiza logout do usuário
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão e regenera token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Você saiu com sucesso.');
    }
}

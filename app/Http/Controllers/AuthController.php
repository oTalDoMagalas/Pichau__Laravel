<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // se o email existe mas a senha está errada, retorna mensagem específica
        $user = User::where('email', $request->email)->first();
        if ($user && ! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Senha incorreta'])->withInput();
        }

        // tentativa normal de autenticação
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('users.index'));
        }

        // email não existe ou outro problema (mensagem genérica)
        return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    // Mostra o formulário que permite editar nome, email e senha informando o email atual
    public function showEditForm()
    {
        return view('auth.passwords.edit'); // criamos essa view abaixo
    }

    // Processa a atualização dos dados (não usa token)
    public function update(Request $request)
    {
        $request->validate([
            'current_email' => 'required|email|exists:users,email',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('email', $request->current_email)->first();

        // se o novo email for diferente, checa se já existe
        if ($request->email !== $user->email && User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'O email informado já está em uso.'])->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Dados atualizados com sucesso. Faça login com as novas credenciais.');
    }
}

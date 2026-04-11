<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. validação básica
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // 2. criar usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,

            // 🔥 aqui está a mágica
            'password' => Hash::make($request->password)
        ]);

        return response()->json($user);
    }

    public function login(Request $request)
{
    // 1. validar dados
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 2. buscar usuário
    $user = \App\Models\User::where('email', $request->email)->first();

    // 3. verificar se existe e senha correta
    if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

   //  cria o token
$token = $user->createToken('auth_token')->plainTextToken;

//  retorna com token
return response()->json([
    'message' => 'Login realizado com sucesso',
    'user' => $user,
    'token' => $token
]);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;

class DespesasController extends Controller
{
   public function store(Request $request)
{
    // 1. buscar o serviço
    $servico = \App\Models\Servico::find($request->servico_id);

    // 2. verificar se existe e se pertence ao usuário
    if (!$servico || $servico->user_id !== $request->user()->id) {
        return response()->json(['error' => 'Acesso negado'], 403);
    }

    // 3. criar despesa
    $despesa = \App\Models\Despesa::create([
        'servico_id' => $request->servico_id,
        'descricao' => $request->descricao,
        'valor' => $request->valor
    ]);

    return response()->json($despesa);
}

public function destroy($id, Request $request)
{
    // 1. buscar despesa
    $despesa = \App\Models\Despesa::find($id);

    // 2. verifica se existe
    if (!$despesa) {
        return response()->json(['error' => 'Despesa não encontrada'], 404);
    }

    // 3. pegar serviço dela
    $servico = $despesa->servico;

    // 4. verificar se pertence ao usuário
    if ($servico->user_id !== $request->user()->id) {
        return response()->json(['error' => 'Acesso negado'], 403);
    }

    // 5. deletar
    $despesa->delete();

    return response()->json(['message' => 'Despesa removida']);
}
}

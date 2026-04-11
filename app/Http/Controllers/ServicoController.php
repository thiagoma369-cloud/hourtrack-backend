<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function store(Request $request)
    {
        $servico = \App\Models\Servico::create([
            'user_id' => $request->user()->id,
            'data' => $request->data,
            'maquina' => $request->maquina,
            'contratante' => $request->contratante,
            'tipo' => $request->tipo,
            'valor_hora' => $request->valorHora,
            'horas' => $request->horas
        ]);

        return response()->json($servico);
    }

    public function index(Request $request)
{
   return \App\Models\Servico::with('despesas')
    ->where('user_id', $request->user()->id)
    ->get();
}

    //Remover 
    public function destroy($id)
    {
        \App\Models\Servico::destroy($id);

        return response()->json(['message' => 'Serviço removido']);
    }
}

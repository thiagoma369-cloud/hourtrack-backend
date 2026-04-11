<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste()
     {
      return response()->json([
        'mensagem' => 'Controller funcionando'
      ]);
    }

    public function servico() 
    {
      return response()->json([
        'nome' => 'Trator',
        'horas' => 5,
        'valorHora' => 100
      ]); 
    }
}

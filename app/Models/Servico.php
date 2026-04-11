<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'user_id',
        'data',
        'maquina',
        'contratante',
        'tipo',
        'valor_hora',
        'horas'
    ];

     public function despesas()
    {
        return $this->hasMany(\App\Models\Despesa::class);
    }
}

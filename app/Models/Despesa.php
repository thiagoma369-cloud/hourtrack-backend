<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = [
    'servico_id',    
    'descricao',
        'valor'
    ];

    public function servico()
     {
      return $this->belongsTo(Servico::class);   
    }
}

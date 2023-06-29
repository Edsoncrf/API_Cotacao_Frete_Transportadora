<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    protected $table = 'cotacao';
    
    protected $fillable = ['id_servico', 'prazo_entrega', 'peso_final', 'peso_inicial','valor', 'cep_inicio', 'cep_final'];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }
}

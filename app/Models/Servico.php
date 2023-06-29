<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';

    protected $fillable = ['id_transportadora', 'nm_servico'];

    public function transportadora()
    {
        return $this->belongsTo(Transportadora::class, 'id_transportadora');
    }

    public function cotacoes()
    {
        return $this->hasMany(Cotacao::class, 'id_servico');
    }

    public $timestamps = false;
}

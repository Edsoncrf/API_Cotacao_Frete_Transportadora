<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $table = 'transportadoras';

    protected $fillable = ['nm_transportadora'];

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'id_transportadora');
    }

    public $timestamps = false;
}

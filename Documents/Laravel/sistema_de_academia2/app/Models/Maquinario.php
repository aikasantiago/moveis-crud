<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinario extends Model
{
    protected $fillable = [
        'nome',
        'marca', 
        'garantia',
        'nota_fiscal',
        'funcao_da_maquina'
    ];
}

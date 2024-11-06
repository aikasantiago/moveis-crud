<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'data_de_nascimento',
        'cpf',
        'numero',
        'email',
    ];

}

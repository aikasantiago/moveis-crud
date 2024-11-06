<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplemento extends Model
{
    protected $fillable = [
        'nome',
        'marca',
        'quantidade',
        'peso',
        'formato',
        'funcao',
        'valor',
    ];

}

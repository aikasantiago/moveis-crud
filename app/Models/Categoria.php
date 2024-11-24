<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome_categoria'];

    public function movels()
    {
        return $this->hasMany(Movel::class, 'nome_categoria', 'nome_categoria'); //quantos móveis dentro de uma categoria
    }
}

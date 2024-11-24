<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Movel extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'nome_categoria'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'nome_categoria', 'nome_categoria');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
        ];
    }

    /**
     * verifica se o móvel está em estoque
     *
     * @return bool
     */
    public function estaEmEstoque(): bool
    {
        return $this->estoque > 0;
    }
}

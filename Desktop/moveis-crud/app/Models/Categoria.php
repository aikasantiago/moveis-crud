<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categoria extends Model
{
    use HasFactory, Notifiable;

    // Defina o nome correto da tabela, caso não seja o plural de "Categoria"
    protected $table = 'categorias';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',  // Defina o nome da categoria
    ];

    /**
     * Os atributos que devem ser ocultados durante a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at', 
        'updated_at',
    ];

    /**
     * Relacionamento: Cada categoria tem muitos móveis.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moveis()
    {
        return $this->hasMany(Movel::class);
    }

    /**
     * Método para contar a quantidade de móveis associados a uma categoria.
     *
     * @return int
     */
    public function quantidadeMoveis(): int
    {
        return $this->moveis()->count();
    }

    /**
     * Adiciona um atributo virtual para a quantidade de móveis.
     *
     * @return int
     */
    public function getQuantidadeMoveisAttribute(): int
    {
        return $this->quantidadeMoveis();
    }

    /**
     * Método para verificar se a categoria possui móveis associados.
     *
     * @return bool
     */
    public function temMoveis(): bool
    {
        return $this->moveis()->exists();
    }

    /**
     * Método para obter o nome completo da categoria (capitalizando a primeira letra).
     *
     * @return string
     */
    public function getNomeCompletoAttribute(): string
    {
        return ucfirst($this->nome);
    }
}

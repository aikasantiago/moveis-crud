<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Movel extends Model
{
    use HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'categoria'
    ];

    /**
     * Os atributos que devem ser ocultados durante a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Adicione campos que deseja ocultar, se necessário
    ];

    /**
     * Obter os atributos que devem ser convertidos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2', // Formata o preço como decimal
            // Adicione outras conversões se necessário
        ];
    }

    /**
     * Método para verificar se o móvel está em estoque.
     *
     * @return bool
     */
    public function estaEmEstoque(): bool
    {
        return $this->estoque > 0;
    }
}

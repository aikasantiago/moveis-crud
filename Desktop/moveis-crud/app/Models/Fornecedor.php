<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Fornecedor extends Model
{
    protected $table = 'fornecedors';  // Defina o nome correto da tabela

    use HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
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
     * Os atributos que devem ser convertidos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Adicione outras conversões, se necessário
        ];
    }

    /**
     * Método para verificar se o fornecedor tem o endereço completo.
     *
     * @return bool
     */
    public function temEnderecoCompleto(): bool
    {
        return !empty($this->endereco);
    }

    /**
     * Método para obter o nome completo do fornecedor.
     *
     * @return string
     */
    public function getNomeCompletoAttribute(): string
    {
        return ucfirst($this->nome);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovelsTable extends Migration
{
    public function up()
    {
        Schema::create('movels', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nome_categoria'); // Chave que faz o relacionamento
            $table->integer('estoque');
            $table->decimal('preco');
            $table->foreign('nome_categoria')->references('nome_categoria')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movels');
    }
}

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
            $table->string('nome_categoria')->nullable();
            $table->decimal('preco', 10, 2);
            $table->integer('estoque')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movels');
    }
}

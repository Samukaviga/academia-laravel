<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('treino', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' com auto-incremento
            $table->string('serie')->nullable();
            $table->string('tipo')->nullable();
            $table->unsignedInteger('id_exercicio')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->integer('concluido')->nullable();
            $table->string('obs')->nullable();
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'

            // Definindo a chave estrangeira
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_exercicio')->references('id')->on('exercicio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treino');
    }
};

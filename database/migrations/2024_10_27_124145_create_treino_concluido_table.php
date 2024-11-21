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
        Schema::create('treino_concluido', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' como chave primária
            $table->string('tipo'); // Coluna do tipo string
            $table->dateTime('data'); // Coluna para data e hora
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chave estrangeira para 'users'
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treino_concluido');
    }
};

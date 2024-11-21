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

        Schema::create('exercicio', function (Blueprint $table) {
            $table->id(); // Isso cria uma coluna 'id' com auto-incremento
            $table->string('agrupamento')->nullable();
            $table->string('nome')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps(); // Isso cria as colunas 'created_at' e 'updated_at'
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicio');
    }
};

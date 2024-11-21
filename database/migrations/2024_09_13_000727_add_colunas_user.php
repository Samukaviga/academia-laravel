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
        Schema::table('users', function (Blueprint $table) {
            $table->string('objetivo')->nullable();
            $table->integer('id_professor')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_troca')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('saude_medicamento')->nullable();
            $table->boolean('tipo_usuario')->default(false);

    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('objetivo');
            $table->dropColumn('id_professor');
            $table->dropColumn('data_inicio');
            $table->dropColumn('data_troca');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('saude_medicamento');
            $table->dropColumn('tipo_usuario'); 
        });
    }
};

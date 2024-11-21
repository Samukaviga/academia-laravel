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
        Schema::create('agrupamento', function (Blueprint $table) {
            $table->id();
            $table->string('serie')->nullable();
            $table->string('tipo')->nullable();
            $table->string('obs')->nullable();
            $table->string('nivel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agrupamento');
    }
};

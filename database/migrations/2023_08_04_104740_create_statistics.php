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
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->string('temporada');
            $table->integer('puntos_anotados')->nullable();
            $table->integer('partidos_jugados')->nullable();
            $table->integer('faltas_cometidas')->nullable();
            $table->string('tiros_libres')->nullable();
            $table->foreignId('jugadora_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas');
    }
};

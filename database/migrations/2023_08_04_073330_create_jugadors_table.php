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
        Schema::create('jugadoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->foreignId('equipo_id')->nullable();
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('posicion')->nullable();
            $table->string('comentarios')->nullable();
            $table->integer('dorsal')->nullable();
            $table->boolean('interesante')->default(false);
            $table->boolean('junior')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadoras');
    }
};

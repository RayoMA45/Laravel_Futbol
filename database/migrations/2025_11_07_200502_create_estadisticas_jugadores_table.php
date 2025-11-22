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
        Schema::create('estadisticas_jugadores', function (Blueprint $table) {
            $table->id();
            $table->integer('goles');
            $table->integer('asistencias');
            $table->integer('tarjetas_amarillas');
            $table->integer('tarjetas_rojas');
            $table->integer('minutos_jugados');
            $table->foreignId('partido_jugado_id')->constrained('partido_jugados')->onDelete('cascade');
            $table->foreignId('jugador_id')->constrained('jugadores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas_jugadores');
    }
};

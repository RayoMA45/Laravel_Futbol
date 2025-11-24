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
        Schema::create('partidosjugados', function (Blueprint $table) {
            $table->id();
            $table->integer('goles_local');
            $table->integer('goles_visitante');
            $table->string('local');
            $table->string('visitante');
            $table->date('fecha');
            $table->foreignId('estadio_id')->constrained('estadios')->onDelete('cascade');
            $table->foreignId('temporada_id')->constrained('temporadas')->onDelete('cascade');
            $table->foreignId('arbitro_id')->constrained('arbitros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidosjugados');
    }
};

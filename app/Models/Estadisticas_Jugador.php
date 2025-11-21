<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estadisticas_Jugador extends Model
{
    use HasFactory; 
    protected $table = 'estadisticas_jugadores';
    protected $fillable = [
        'goles',
        'asistencias',
        'tarjetas_rojas',
        'tarjetas_amarillas',
        'min_jugados',
        'partido_jugado_id',
        'jugador_id'
    ];

    public $timestamps = true;

    public function jugadores()
    {
        return $this->belongsTo(Jugador::class);
    }

    public function partido_jugado()
    {
        return $this->belongsTo(Partido_Jugado::class);
    }
}

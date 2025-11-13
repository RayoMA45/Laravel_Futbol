<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partido_Jugado extends Model
{
    use HasFactory;
    protected $fillable = [
        'goles_local',
        'goles_visitante',
        'local',
        'visitante',
        'fecha',
        'arbitro_id',
        'temporada_id',
        'estadio_id',
        'equipos_id'
    ];

    public $timestamps = true;

    public function estadisticas_jugadores()
    {
        return $this->hasMany(Estadisticas_Jugador::class);
    }

    public function arbitros()
    {
        return $this->belongsTo(Arbitro::class);
    }
    
    public function temporadas()
    {
        return $this->belongsTo(Temporada::class);
    }

    public function estadios()
    {
        return $this->belongsTo(Estadio::class);
    }

    public function equipos()
    {
        return $this->belongsTo(Equipo::class);
    }
}

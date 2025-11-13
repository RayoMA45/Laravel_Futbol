<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad',
        'titulos',
        'estadio_id'
    ];

    public $timestamps = true;

    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }

    public function estadisticas_equipo()
    {
        return $this->hasMany(Estadisticas_Equipo::class);
    }

    public function partido_jugado()
    {
        return $this->hasMany(Partido_Jugado::class);
    }
    
    public function estadio()
    {
        return $this->belongsTo(Estadio::class);
    }
}

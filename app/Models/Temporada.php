<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temporada extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public $timestamps = true;

    public function estadisticas_equipos()
    {
        return $this->hasMany(EstadisticasEquipo::class);
    }

    public function partido_jugado()
    {
        return $this->hasMany(PartidoJugado::class);
    }
}

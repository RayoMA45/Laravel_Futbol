<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estadisticas_Equipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'partidos_ganados',
        'partidos_empatados',
        'partidos_perdidos',
        'gol_favor',
        'gol_contra',
        'puntos',
        'equipo_id',
        'temporada_id'
    ];

    public $timestamps = true;

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

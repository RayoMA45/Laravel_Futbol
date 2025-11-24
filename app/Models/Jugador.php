<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jugador extends Model
{
    use HasFactory;
    protected $table = 'jugadores';
    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'posicion',
        'equipo_id'
    ];

    public $timestamps = true;

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function estadistica_jugadores()
    {
        return $this->belongsTo(EstadisticasJugador::class);
    }
}

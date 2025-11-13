<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ciudad',
        'capacidad',
    ];

    public $timestamps = true;

    public function equipo()
    {
        return $this->hasMany(Equipo::class);
    }

    public function partido_jugado()
    {
        return $this->hasMany(Partido_Jugado::class);
    }
}
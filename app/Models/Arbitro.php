<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arbitro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'nacionalidad'
    ];

    public $timestamps = true;

    public function partido_jugado()
    {
        return $this->hasMany(PartidoJugado::class);
    }

}

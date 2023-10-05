<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;
    protected $fillable = [
        'puntos_anotados',
        'faltas_cometidas',
        'tiros_libres',
        'partidos_jugados',
        'temporada'
    ];

    public function temporada ()
    {
        return $this->belongsTo(Jugadora::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadora extends Model
{
    use HasFactory;

    protected $table = 'jugadoras';
    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'equipo_id',
        'telefono',
        'posicion',
        'comentarios',
        'interesante',
        'junior'
    ];

    public function equipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    public function estadisticas()
    {
        return $this->hasMany(Estadistica::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    protected $fillable = [
      'temporada',
      'jugadora_id',
      'equipo_id',
      'salario'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
    public function jugadora()
    {
        return $this->belongsTo(Jugadora::class);
    }
}

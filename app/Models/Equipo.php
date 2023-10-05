<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = [
        'nombre',
        'ciudad',
        'liga_id'
    ];
    public function jugadoras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Jugadora::class);
    }
    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }
}

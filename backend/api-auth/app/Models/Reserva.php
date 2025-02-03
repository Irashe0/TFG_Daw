<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reserva',
        'id_miembro',
        'id_horario',
        'cantidad_entradas',
        'fecha_reserva',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }
}

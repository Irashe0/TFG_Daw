<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_miembro',
        'id_rol',
        'nombre_usuario',
        'id_palomitas',
        'fecha_creacion'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}

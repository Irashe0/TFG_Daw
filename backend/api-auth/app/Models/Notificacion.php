<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_miembro', 
        'mensaje',
        'leida',
        'fecha_envio',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

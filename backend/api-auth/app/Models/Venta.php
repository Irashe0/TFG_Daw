<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_venta',
        'id_reserva',
        'fecha_venta',
        'total'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}

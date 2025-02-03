<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_factura',
        'fecha_emision',
        'total_factura',
        'id_venta',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}

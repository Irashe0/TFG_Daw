<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palomita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_palomitas',
        'pass_usuario',
    ];
}

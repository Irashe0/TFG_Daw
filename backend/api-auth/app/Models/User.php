<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';

    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',

    ];

    protected $hidden = [
        'remember_token',
        'id_palomitas',
        'fecha_creacion',
        'id_miembro',
    ];

    protected function casts(): array
    {
        return [
            'fecha_creacion' => 'datetime',
        ];
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }


    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('nombre_rol', $role);
        }

        if (is_array($role)) {
            return !! collect($role)->intersect($this->roles->pluck('nombre_rol'))->count();
        }

        return false;
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

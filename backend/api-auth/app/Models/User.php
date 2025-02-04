<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $nombre_usuario
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Reserva[] $reservas
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nombre_usuario',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'id_user');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class)
					->withPivot('id')
					->withTimestamps();
	}
}

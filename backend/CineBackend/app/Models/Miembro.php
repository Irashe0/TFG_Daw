<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Miembro
 * 
 * @property int $id_miembro
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property int|null $id_rol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Role|null $role
 * @property Collection|Notificacione[] $notificaciones
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Miembro extends Model
{
	protected $table = 'miembros';
	protected $primaryKey = 'id_miembro';

	protected $casts = [
		'id_rol' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'email',
		'id_rol'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}

	public function notificaciones()
	{
		return $this->hasMany(Notificacione::class, 'id_miembro');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_miembro');
	}
}

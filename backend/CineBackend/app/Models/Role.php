<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Miembro[] $miembros
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'id_rol';

	protected $fillable = [
		'nombre_rol'
	];

	public function miembros()
	{
		return $this->hasMany(Miembro::class, 'id_rol');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_rol');
	}
}

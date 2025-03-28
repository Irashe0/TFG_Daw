<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property int $id_miembro
 * @property int|null $id_rol
 * @property string $nombre_usuario
 * @property string $pass_usuario
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Miembro $miembro
 * @property Role|null $role
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';

	protected $casts = [
		'id_miembro' => 'int',
		'id_rol' => 'int'
	];

	protected $fillable = [
		'id_miembro',
		'id_rol',
		'nombre_usuario',
		'pass_usuario'
	];

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'id_miembro');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sala
 * 
 * @property int $id_sala
 * @property int $id_cine
 * @property string $nombre
 * @property int $capacidad
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cine $cine
 * @property Collection|Butaca[] $butacas
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Sala extends Model
{
	protected $table = 'salas';
	protected $primaryKey = 'id_sala';

	protected $casts = [
		'id_cine' => 'int',
		'capacidad' => 'int'
	];

	protected $fillable = [
		'id_cine',
		'nombre',
		'capacidad'
	];

	public function cine()
	{
		return $this->belongsTo(Cine::class, 'id_cine');
	}

	public function butacas()
	{
		return $this->hasMany(Butaca::class, 'id_sala');
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'id_sala');
	}
}

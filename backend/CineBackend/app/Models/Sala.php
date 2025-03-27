<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sala
 * 
 * @property int $id_sala
 * @property int $id_cine
 * @property string $nombre
 * @property int $capacidad
 * 
 * @property Cine $cine
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Sala extends Model
{
	protected $table = 'salas';
	protected $primaryKey = 'id_sala';
	public $timestamps = false;

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

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'id_sala');
	}
}

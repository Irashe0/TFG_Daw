<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property int $id_horario
 * @property int $id_pelicula
 * @property int $id_sala
 * @property Carbon $fecha_hora
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Pelicula $pelicula
 * @property Sala $sala
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';
	protected $primaryKey = 'id_horario';

	protected $casts = [
		'id_pelicula' => 'int',
		'id_sala' => 'int',
		'fecha_hora' => 'datetime'
	];

	protected $fillable = [
		'id_pelicula',
		'id_sala',
		'fecha_hora'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'id_pelicula');
	}

	public function sala()
	{
		return $this->belongsTo(Sala::class, 'id_sala');
	}
}

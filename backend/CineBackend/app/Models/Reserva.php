<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 * 
 * @property int $id_reserva
 * @property int $id_user
 * @property int $id_horario
 * @property int $cantidad_entradas
 * @property Carbon|null $fecha_reserva
 * 
 * @property User $user
 * @property Horario $horario
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Reserva extends Model
{
	protected $table = 'reservas';
	protected $primaryKey = 'id_reserva';
	public $timestamps = false;

	protected $casts = [
		'id_user' => 'int',
		'id_horario' => 'int',
		'cantidad_entradas' => 'int',
		'fecha_reserva' => 'datetime'
	];

	protected $fillable = [
		'id_user',
		'id_horario',
		'cantidad_entradas',
		'fecha_reserva'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function horario()
	{
		return $this->belongsTo(Horario::class, 'id_horario');
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_reserva');
	}
}

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
 * @property int $id_miembro
 * @property int $id_horario
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Butaca[] $butacas
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Reserva extends Model
{
	protected $table = 'reservas';
	protected $primaryKey = 'id_reserva';

	protected $casts = [
		'id_miembro' => 'int',
		'id_horario' => 'int'
	];

	protected $fillable = [
		'id_miembro',
		'id_horario'
	];

	public function butacas()
	{
		return $this->belongsToMany(Butaca::class, 'reservas_butacas', 'id_reserva', 'id_butaca')
					->withTimestamps();
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_reserva');
	}
}

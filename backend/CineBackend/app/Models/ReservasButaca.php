<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservasButaca
 * 
 * @property int $id_reserva
 * @property int $id_butaca
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Butaca $butaca
 * @property Reserva $reserva
 *
 * @package App\Models
 */
class ReservasButaca extends Model
{
	protected $table = 'reservas_butacas';
	public $incrementing = false;

	protected $casts = [
		'id_reserva' => 'int',
		'id_butaca' => 'int'
	];

	protected $fillable = [
		'id_reserva',
		'id_butaca'
	];

	public function butaca()
	{
		return $this->belongsTo(Butaca::class, 'id_butaca');
	}

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 * 
 * @property int $id_venta
 * @property int $id_reserva
 * @property int $id_butaca
 * @property float $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Butaca $butaca
 * @property Reserva $reserva
 * @property Collection|Factura[] $facturas
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'id_venta';

	protected $casts = [
		'id_reserva' => 'int',
		'id_butaca' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'id_reserva',
		'id_butaca',
		'total'
	];

	public function butaca()
	{
		return $this->belongsTo(Butaca::class, 'id_butaca');
	}

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'id_venta');
	}
}

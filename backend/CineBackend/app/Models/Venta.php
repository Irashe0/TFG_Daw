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
 * @property Carbon|null $fecha_venta
 * @property float $total
 * 
 * @property Reserva $reserva
 * @property Collection|Factura[] $facturas
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'id_venta';
	public $timestamps = false;

	protected $casts = [
		'id_reserva' => 'int',
		'fecha_venta' => 'datetime',
		'total' => 'float'
	];

	protected $fillable = [
		'id_reserva',
		'fecha_venta',
		'total'
	];

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'id_reserva');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'id_venta');
	}
}

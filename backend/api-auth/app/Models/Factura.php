<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 * 
 * @property int $id_factura
 * @property int $id_venta
 * @property string $numero_factura
 * @property Carbon $fecha_emision
 * @property float $total_factura
 * 
 * @property Venta $venta
 *
 * @package App\Models
 */
class Factura extends Model
{
	protected $table = 'facturas';
	protected $primaryKey = 'id_factura';
	public $timestamps = false;

	protected $casts = [
		'id_venta' => 'int',
		'fecha_emision' => 'datetime',
		'total_factura' => 'float'
	];

	protected $fillable = [
		'id_venta',
		'numero_factura',
		'fecha_emision',
		'total_factura'
	];

	public function venta()
	{
		return $this->belongsTo(Venta::class, 'id_venta');
	}
}

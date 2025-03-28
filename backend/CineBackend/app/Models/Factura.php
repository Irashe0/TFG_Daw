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
 * @property float $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Venta $venta
 *
 * @package App\Models
 */
class Factura extends Model
{
	protected $table = 'facturas';
	protected $primaryKey = 'id_factura';

	protected $casts = [
		'id_venta' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'id_venta',
		'numero_factura',
		'total'
	];

	public function venta()
	{
		return $this->belongsTo(Venta::class, 'id_venta');
	}
}

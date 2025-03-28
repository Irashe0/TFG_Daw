<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Butaca
 * 
 * @property int $id_butaca
 * @property int $id_sala
 * @property string $fila
 * @property int $numero
 * @property string $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sala $sala
 * @property Collection|Reserva[] $reservas
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Butaca extends Model
{
	protected $table = 'butacas';
	protected $primaryKey = 'id_butaca';

	protected $casts = [
		'id_sala' => 'int',
		'numero' => 'int'
	];

	protected $fillable = [
		'id_sala',
		'fila',
		'numero',
		'estado'
	];

	public function sala()
	{
		return $this->belongsTo(Sala::class, 'id_sala');
	}

	public function reservas()
	{
		return $this->belongsToMany(Reserva::class, 'reservas_butacas', 'id_butaca', 'id_reserva')
					->withTimestamps();
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_butaca');
	}
}

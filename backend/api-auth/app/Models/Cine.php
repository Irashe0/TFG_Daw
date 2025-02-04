<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cine
 * 
 * @property int $id_cine
 * @property string $nombre
 * @property string $direccion
 * @property string|null $telefono
 * 
 * @property Collection|Sala[] $salas
 *
 * @package App\Models
 */
class Cine extends Model
{
	protected $table = 'cines';
	protected $primaryKey = 'id_cine';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'direccion',
		'telefono'
	];

	public function salas()
	{
		return $this->hasMany(Sala::class, 'id_cine');
	}
}

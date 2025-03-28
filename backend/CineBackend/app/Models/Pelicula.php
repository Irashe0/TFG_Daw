<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 * 
 * @property int $id_pelicula
 * @property string $titulo
 * @property int|null $id_director
 * @property string|null $sinopsis
 * @property int|null $duracion
 * @property string|null $clasificacion
 * @property string|null $productora
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Director|null $director
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Pelicula extends Model
{
	protected $table = 'peliculas';
	protected $primaryKey = 'id_pelicula';

	protected $casts = [
		'id_director' => 'int',
		'duracion' => 'int'
	];

	protected $fillable = [
		'titulo',
		'id_director',
		'sinopsis',
		'duracion',
		'clasificacion',
		'productora'
	];

	public function director()
	{
		return $this->belongsTo(Director::class, 'id_director');
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'id_pelicula');
	}
}

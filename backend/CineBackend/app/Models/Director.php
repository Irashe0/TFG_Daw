<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
 * 
 * @property int $id_director
 * @property string $nombre
 * @property string|null $apellidos
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Director extends Model
{
	protected $table = 'director';
	protected $primaryKey = 'id_director';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'apellidos'
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class, 'id_director');
	}
}

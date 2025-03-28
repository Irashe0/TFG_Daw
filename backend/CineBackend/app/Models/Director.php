<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
 * 
 * @property int $id_director
 * @property string $nombre
 * @property string|null $apellidos
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Director extends Model
{
	protected $table = 'director';
	protected $primaryKey = 'id_director';

	protected $fillable = [
		'nombre',
		'apellidos'
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class, 'id_director');
	}
}

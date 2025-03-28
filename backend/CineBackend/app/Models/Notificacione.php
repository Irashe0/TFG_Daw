<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificacione
 * 
 * @property int $id_notificacion
 * @property int $id_miembro
 * @property string $mensaje
 * @property bool $leida
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Miembro $miembro
 *
 * @package App\Models
 */
class Notificacione extends Model
{
	protected $table = 'notificaciones';
	protected $primaryKey = 'id_notificacion';

	protected $casts = [
		'id_miembro' => 'int',
		'leida' => 'bool'
	];

	protected $fillable = [
		'id_miembro',
		'mensaje',
		'leida'
	];

	public function miembro()
	{
		return $this->belongsTo(Miembro::class, 'id_miembro');
	}
}

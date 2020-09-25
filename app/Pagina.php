<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
	protected $primaryKey = 'id';
	protected $guarded = [
		'id'
	];
	protected $table = 'paginas';
	public $timestamps = true;
	public function dono()
	{
		return $this->HasOne(User::class, 'id', 'criador_id');
	}
	public function ultimo_editor()
	{
		return $this->HasOne(User::class, 'id', 'ultimo_editor_id');
	}
	public function categoria()
	{
		return $this->HasOne(Categoria::class, 'id', 'categoria_id');
	}
	public function getCreatedAtAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function getUpdatedAtAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
}

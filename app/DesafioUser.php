<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesafioUser extends Model
{
	protected $primaryKey = 'id';
	protected $guarded = [
		'id'
	];
	protected $table = 'medalhas_user';
	public $timestamps = true;
	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function desafio()
	{
		return $this->hasOne('App\Medalhas', 'id', 'medalha_id');
	}
	public function getCreatedAtAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function getUpdatedAtAttribute($value)
	{
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
}

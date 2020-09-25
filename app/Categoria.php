<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $primaryKey = 'id';
	protected $guarded = [
		'id'
	];
	protected $table = 'categorias';
	public $timestamps = true;
}

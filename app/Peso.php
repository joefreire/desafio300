<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
   	protected $primaryKey = 'id';
	protected $guarded = [
		'id'
	];
	protected $table = 'peso';
	public $timestamps = true;
}

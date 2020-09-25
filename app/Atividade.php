<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
	protected $primaryKey = 'id';
	protected $guarded = [
		'id','coordenadas','LngStart','LatStart'
	];
	protected $table = 'atividades';
	public $timestamps = true;
	/*	protected $attributes = ['coodenadas','LngStart','LatStart'];*/
	protected $appends = ['coordenadas','LngStart','LatStart'];
	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public static function contaDias($id = null)
	{
		if($id == null){
			$id = \Auth::id();
		}
		$dias = static::select(\DB::raw('LEFT(start_date_local , 10)'))->where('user_id',$id)
		->groupBy(\DB::raw('LEFT(start_date_local , 10)'))
		->whereYear('start_date_local', '=', date('Y'))
		->get();

		return count($dias);
	}
	public static function contaDiasAteAtividade($id)
	{
		$dias = static::select(\DB::raw('LEFT(start_date_local , 10)'))
		->where('id','<=',$id)->where('user_id',\Auth::id())->groupBy(\DB::raw('LEFT(start_date_local , 10)'))
		->get();
		
		return count($dias);
	}
	public static function calorias($id = null)
	{
		if($id == null){
			$id = \Auth::id();
		}
		$resultado = static::select('calories')->where('user_id',$id)
		->sum('calories');

		return $resultado;
	}
	public static function distanciaTotal($id = null)
	{
		if($id == null){
			$id = \Auth::id();
		}
		$resultado = static::select('distance')->where('user_id',$id)
		->whereYear('start_date_local', '=', date('Y'))
		->sum('distance');

		return $resultado;
	}
	public static function tempoTotal($id = null)
	{
		if($id == null){
			$id = \Auth::id();
		}
		$resultado = static::select('elapsed_time')->where('user_id',$id)
		->whereYear('start_date_local', '=', date('Y'))
		->sum('elapsed_time');
		$minsec = gmdate("i:s", $resultado);    
		$hours = (gmdate("d", $resultado)-1)*24 + gmdate("H", $resultado);    

		return $hours.':'.$minsec;
	}
	public function setDistanceAttribute($value)
	{     
		$this->attributes['distance'] = ($value != 0 ? $value/1000 : 0);         
	}

	public static function total($id = null)
	{
		if($id == null){
			$id = \Auth::id();
		}
		$resultado = static::select('id')->where('user_id',$id)
		->whereYear('start_date_local', '=', date('Y'))
		->count();

		return $resultado;
	}
	public static function tipoAtividade($atividade)
	{
		switch ($atividade) {
			case 'Ride':
			return 'Ciclismo';
			case 'Run':
			return 'Corrida';
			case 'Swim':
			return 'Natação';
			case 'Walk':
			return 'Caminhada';
			case 'Hike':
			return 'Trote';
			case 'AlpineSki':
			return 'Esqui alpino';
			case 'BackcountrySki':
			return 'Esqui fora de pista';
			case 'Canoeing':
			return 'Canoagem';
			case 'Crossfit':
			return 'Crossfit';
			case 'EBikeRide':
			return 'Ciclismo de bicicleta elétrica';
			case 'Elliptical':
			return 'Elíptico';
			case 'VirtualRide':
			return 'Bicicleta Ergometrica';
			case 'VirtualRun':
			return 'Esteira';
			case 'WeightTraining':
			return 'Treino com peso';
			case 'Handcycle':
			return 'Handbike';
			case 'IceSkate':
			return 'Patinação no gelo';
			case 'InlineSkate':
			return 'Patinação inline';
			case 'NordicSki':
			return 'Esqui nórdico';
			case 'Kayaking':
			return 'Caiaquismo';
			case 'RockClimbing':
			return 'Escalada em rochas';
			case 'Kitesurf':
			return 'Kitesurf';
			case 'RollerSki':
			return 'Esqui de rodas';
			case 'Rowing':
			return 'Remo';
			case 'Snowboard':
			return 'Snowboard';
			case 'Snowshoe':
			return 'Raquete de neve';
			case 'StairStepper':
			return 'Escada';
			case 'StandUpPaddling':
			return 'Stand Up Paddle';
			case 'Workout':
			return 'Treino';
			case 'Surfing':
			return 'Surf';
			case 'Velomobile':
			return 'Velomobile';
			case 'Wheelchair':
			return 'Cadeira de rodas';
			case 'Windsurf':
			return 'Windsurf';
			case 'Yoga':
			return 'Yoga';
		}

		return $resultado;
	}
	public function getCreatedAtAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function getStartDateLocalAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function getDistanceAttribute($value) {
		return (!empty($value) ? ($value > 1 ? ($value*1000)/1000 : $value) : 0);
	}
	public function getCoordenadasAttribute(){
		if(!empty($this->map_polyline)){
			$points = \Polyline::decode($this->map_polyline);
			return \Polyline::pair(array_reverse($points));
		}else{
			return null;
		}
		
	}
	public function getLatStartAttribute(){
		if(!empty($this->start_latlng)){
			return explode(',',str_replace(array('[',']'),'',$this->start_latlng))[0];
		}else{
			return null;
		}
		
	}
	public function getLngStartAttribute(){
		if(!empty($this->start_latlng)){
			return explode(',',str_replace(array('[',']'),'',$this->start_latlng))[1];
		}else{
			return null;
		}
		
	}

	public static function secondsToTime($resultado) {
		$minsec = gmdate("i:s", $resultado);    
		$hours = (gmdate("d", $resultado)-1)*24 + gmdate("H", $resultado);    

		return $hours.':'.$minsec;
		
	}
	
}

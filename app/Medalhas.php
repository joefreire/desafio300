<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medalhas extends Model
{
	protected $primaryKey = 'id';
	protected $guarded = [
		'id'
	];
	protected $table = 'medalhas';
	public $timestamps = true;

	public function getCreatedAtAttribute($value) {
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function dono()
	{
		return $this->HasOne(User::class, 'id', 'criador_id');
	}
	public function diasParaAcabar()
	{
		return \Carbon\Carbon::parse($this->getOriginal('periodo_fim'))->diffForHumans();
	}
	public function diasParaComecar()
	{
		return \Carbon\Carbon::parse($this->getOriginal('periodo_inicio'))->diffForHumans();
	}
	public function getPeriodoInicioAttribute($value)
	{
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}	
	public function getPeriodoFimAttribute($value)
	{
		return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
	}
	public function setPeriodoFimAttribute($value)
	{
		$this->attributes['periodo_fim'] = (!empty($value) ? \Carbon\Carbon::createFromFormat('d/m/Y', $value) : null);
	}
	public function setPeriodoInicioAttribute($value)
	{
		$this->attributes['periodo_inicio'] = (!empty($value) ? \Carbon\Carbon::createFromFormat('d/m/Y', $value) : null);
	}
	public function verificaAndamento($user_id)
	{
		$desafioUser = \App\DesafioUser::with('user','desafio')->where('user_id',$user_id)->where('medalha_id',$this->id)->first();
		if($desafioUser->concluido == 'Sim'){
			return 100;
		}
		if(empty($desafioUser)){
			return null;
		}
		if($this->tipo == 'Km'){
			$atividades = \App\Atividade::where('user_id', $user_id)
			->whereDate('start_date_local','<=', $this->getOriginal('periodo_fim'))
			->whereDate('start_date_local','>=', $this->getOriginal('periodo_inicio'))
			->sum('distance');


			

			if($atividades >= $this->quantidade){
				$user= \App\User::where('id',$user_id)->first()->nome;
				$desafioUser->concluido = 'Sim';
				$desafioUser->update();
				 \Log::debug($user);
				 \Mail::to($desafioUser->user->email)->send(new \App\Mail\Certificado($desafioUser,$user));

			}else{
				return round(($atividades*100) / $this->quantidade);
			}
		}else{
			$atividades = \App\Atividade::select(\DB::raw('LEFT(start_date_local , 10)'))
			->whereDate('start_date_local','<=', $this->getOriginal('periodo_fim'))
			->whereDate('start_date_local','>=', $this->getOriginal('periodo_inicio'))
			->where('user_id',$user_id)->groupBy(\DB::raw('LEFT(start_date_local , 10)'))
			->get();
			$atividades = count($atividades);
			if($atividades >= $this->quantidade){
				
				$desafioUser->concluido = 'Sim';
				$desafioUser->update();
			}else{
				return round(($atividades*100) / $this->quantidade);
			}

		}

	}
	
	public function userDesafio($user_id)
	{
		$desafioUser = \App\DesafioUser::with('user')->where('user_id',$user_id)->where('medalha_id',$this->id)->first();
		if(empty($desafioUser)){
			return null;
		}
		return $desafioUser;
	}
}

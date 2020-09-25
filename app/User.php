<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'facebook_id', 
        'strava_id',
        'strava_token',
        'strava_refresh_token',
        'strava_expire_at',
        'peso',
        'altura',
        'avatar',
        'estado',
        'cidade',
        'dt_nascimento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function peso($id = null)
    {     
        if($id == null){
            $id = \Auth::id();
        }
        $resultado = Peso::where('user_id',$id)->orderBy('created_at','desc')
        ->first();

        if (empty($resultado)){
            return 0.0;
        }
        return $resultado->peso;         
    }
    public function setDtNascimentoAttribute($value)
    {     
        $this->attributes['dt_nascimento'] = (!empty($value) ? \Carbon\Carbon::createFromFormat('d/m/Y', $value) : null);         
    }

    public function getDtNascimentoAttribute($value) {
        return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
    }
    public function getCreatedAtAttribute($value) {
        return (!empty($value) ? \Carbon\Carbon::parse($value)->format('d/m/Y') : null);
    }
    public function getIdade() {
        return (!empty($this->attributes['dt_nascimento']) ? \Carbon\Carbon::createFromFormat('Y-m-d',$this->attributes['dt_nascimento'])->diff(\Carbon\Carbon::now())->format('%y') : '');
    }
    public function addNew($input)
    {
        $check = static::where('email',$input['email'])->first();


        if(is_null($check)){
            return static::create($input);
        }else{
            if(empty($check->stava_id) && !empty($input['strava_token']) ){
                $check->update([
                    'strava_token' => $input['strava_token'],
                    'strava_id' => $input['strava_id']
                ]);
            }
            if($input['password'] == 'facebook') {
                $check->update([
                    'facebook_id' => $input['facebook_id'],
                    'avatar' => $input['avatar']
                ]);
            }
        }


        return $check;
    }
}

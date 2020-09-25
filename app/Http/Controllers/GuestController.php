<?php

namespace App\Http\Controllers;

use App\DesafioUser;
use App\Medalhas;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function desafio(Request $request)
    {
        if (!isset($request->nome)) {
            return redirect('home')->with('error', "Desafio não existe");
        } else {
            $desafio = Medalhas::where('slug', $request->nome)->first();
            if (!empty($desafio)) {
                $usersDesafio = DesafioUser::with('user')->where('medalha_id', $desafio->id)->get();
                return view('desafio')
                    ->with('usersDesafio', $usersDesafio)
                    ->with('desafio', $desafio);
            } else {
                return redirect('home')->with('error', "Desafio não existe");
            }
        }

    }
}

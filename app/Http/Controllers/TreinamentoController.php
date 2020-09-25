<?php

namespace App\Http\Controllers;

use App\DesafioUser;
use App\Medalhas;
use Illuminate\Http\Request;

class TreinamentoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function telaGeraTreinamento()
    {
        return view('gerarPlanilha');

    }
}

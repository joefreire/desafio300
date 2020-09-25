<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet"> --}}


  <style>
    @media (max-width: 600px) 
    {
      .py-4 
      {
        padding-bottom: 0rem!important;
        padding-top: 0rem!important;
      }
    }
  </style>
  <style type="text/css">
    .navbar-laravel {
      background-color: #2B4B9E!important; 
    }
    .navbar-light .navbar-brand, .navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
      color: white;
    }
    .navbar-light .navbar-nav .nav-link {
      color: white;
      font-size: 1.0rem;
    }
    .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
      color: lightgray;
    }
    .main-section{
      background-color: #fff;
    }
    .profile-header{
      background-color: #2B4B9E;
      height:150px;
      background-image: url('https://desafio300dias.com.br/img/logo_big.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      width: 100%;
    }
    .user-detail{
      margin:-25px 0px 30px 0px;
    }
    .user-detail img{
      height:100px;
      width:100px;
    }
    .user-detail h5{
      margin:15px 0px 5px 0px;
    }
    .user-social-detail{
      padding:15px 0px;
      background-color: #2B4B9E;
    }
    .user-social-detail a i{
      color:#fff;
      font-size:23px;
      padding: 0px 5px;
    }
    .list-group {

      margin:auto;
      padding-top:20px;
    }
    .lead {

     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
   }
   footer {
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    padding: 1.5em;
    background-color: white;
  }
  .challenge-logo {
    border-bottom: 1px solid #ccccd1;
    margin-bottom: -8px;
    max-height: 150px;
    max-width: 100%;
    padding-bottom: 30px;
  }
  .challenge-type {
    background: #FFF;
    color: #999;
    display: inline-block;
    padding: 0 5px;
    margin-bottom: 10px;
    text-transform: uppercase;
  }
  .text-headline, .lead {
    font-size: 17px;
    line-height: 22px;
    text-transform: uppercase;
    font-weight: bold;
  }
  .challenge-description {
    min-height: 1em;
    margin-bottom: 20px;
    max-height: 3em;
    white-space: pre-wrap;
    overflow: hidden;

  }
  .challenge-timespan {
    bottom: 26px;
    left: 0px;
    width: 100%;
    font-weight: 400;
    color: #333;
  }
  #desafios{
    text-align: center;
  }
  .challenge-list-view li .challenge-timespan {
    bottom: 26px;
    left: 0px;
    width: 100%;
    font-weight: 400;
    color: #333;
  }
  .tag {
    background: #fc4c02;
    color: #FFF;
    display: block;
    font-size: 0.8em;
    font-weight: 600;
    width: 65px;
  }
.callout {
  padding: 20px;
  margin: 0 0 15px 0;
  border: 1px solid #eee;
  border-left-width: 5px;
  border-radius: 3px;
}
.callout h4 {
  margin-top: 0;
  margin-bottom: 5px;
}
.callout p:last-child {
  margin-bottom: 0;
}
.callout code {
  border-radius: 3px;
}
.callout + .bs-callout {
  margin-top: -5px;
}

.callout-default {
  border-left-color: #777;
}
.callout-default h4 {
  color: #777;
}

.callout-primary {
  border-left-color: #428bca;
}
.callout-primary h4 {
  color: #428bca;
}

.callout-success {
  border-left-color: #5cb85c;
}
.callout-success h4 {
  color: #5cb85c;
}

.callout-danger {
  border-left-color: #d9534f;
}
.callout-danger h4 {
  color: #d9534f;
}

.callout-warning {
  border-left-color: #f0ad4e;
}
.callout-warning h4 {
  color: #f0ad4e;
}

.callout-info {
  border-left-color: #5bc0de;
}
.callout-info h4 {
  color: #5bc0de;
}

.callout-bdc {
  border-left-color: #29527a;
}
.callout-bdc h4 {
  color: #29527a;
}

</style>

@yield('styles')
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">     
          <img src="https://desafio300dias.com.br/img/logo_big.jpg" alt="Desafio 300 Dias" style="
          height: 3.5rem;
          ">                   
          Desafio 300 dias
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->

            <li class="nav-item ">
              <a href="{{route('ranking')}}" class="nav-link"><i class="fas fa-trophy"></i><span class="ml-1">Ranking</span></a>
            </li>
            @if(!Auth::guest())
            <li class="nav-item ">
              <a href="{{route('perfil')}}" class="nav-link"><i class="fa fa-credit-card"></i> <span>Perfil</span></a>
            </li>
            
            <li class="nav-item ">
              <a href="{{route('novaAtividade')}}" class="nav-link"><i class="fa fa-plus"></i> <span>Nova Atividade</span></a>
            </li>
            @endif
            <li class="nav-item ">  
             <a href="{{route('comoFunciona')}}" class="nav-link"><i class="fa fa-question-circle"></i> <span>Como Funciona</span></a>
           </li>
           <li class="nav-item ">
            <a href="{{route('historia')}}" class="nav-link"{{--  target="_blank" --}}><i class="fas fa-landmark"></i></i> <span>História do Desafio</span></a>
          </li>
          @if(!\Auth::guest() && empty(\Auth::user()->strava_id))
          <li class="nav-item ">
           <a href="{{ url('auth/strava') }}" class="nav-link"><i class="fab fa-strava"></i> <span>Vincular Strava</span></a>
         </li>
         @endif 
         @guest
         <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> {{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          @if (Route::has('register'))
          <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registre-se</a>
          @endif
        </li>
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->nome }} <span class="caret"></span>
          </a>



          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Sair
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>

      @endguest
    </ul>
  </div>
</div>
</nav>

<main class="p-2 wrapper">
  <div class="container-fluid">
    @include('layouts.errors')
    <div class="row">
      @if(!\Auth::guest())
      <div class="col-md-3 main-section card text-center">
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
        </div>
        <div class="row user-detail">
          <div class="col-lg-12 col-sm-12 col-12">
            <a href="{{route('perfil')}}"><img src="{{(Auth::user()->avatar == null?asset('/img/default.jpg'):Auth::user()->avatar)}}" class="rounded-circle img-thumbnail"></a>
            <h5>{{Auth::user()->nome}}</h5>
            <p>@if(!empty(Auth::user()->cidade) && !empty(Auth::user()->estado))<i class="fa fa-map-marker" aria-hidden="true"></i> {{Auth::user()->cidade}}, {{Auth::user()->estado}}.@endif</p>
            <hr>
            <b> 
              <div><span>{{\App\Atividade::contaDias()}}  / 300 </span><br><span class="badge badge-pill badge-primary">TOTAL DE DIAS</div>
                <hr>
                <div class="row">
                 {{--  <div class="mx-auto">{{\App\Atividade::calorias()}}<br><span class="badge badge-pill badge-primary"> CALORIAS </span></div> --}}
                 <div class="mx-auto"> {{\App\Atividade::total()}}<br><span class="badge badge-pill badge-secondary"> ATIVIDADES </span></div>
                 <div class="mx-auto"> {{\App\Atividade::distanciaTotal()}} KMs <br><span class="badge badge-pill badge-secondary"> DISTÂNCIA TOTAL </span></div>
                 <div class="mx-auto"> {{\App\Atividade::tempoTotal()}} <br><span class="badge badge-pill badge-secondary"> TEMPO TOTAL </span></div>

               </div></b>

               <hr>
                              {{--  <div class="list-group">

                                <a href="/home" class="list-group-item active"><i class="fa fa-key"></i> <span>Atividades</span></a>
                                <a href="{{route('perfil')}}" class="list-group-item"><i class="fa fa-credit-card"></i> <span>Perfil</span></a>
                                <a href="{{route('novaAtividade')}}" class="list-group-item"><i class="fa fa-plus"></i> <span>Nova Atividade</span></a>
                                <a href="{{route('comoFunciona')}}" class="list-group-item"><i class="fa fa-question-circle"></i> <span>Como Funciona</span></a>
                                <a href="{{route('historia')}}" class="list-group-item" ><i class="fas fa-landmark"></i></i> <span>História do Desafio</span></a>
                                @if(empty(\Auth::user()->strava_id))
                                <a href="{{ url('auth/strava') }}" class="list-group-item"><i class="fab fa-strava"></i> <span>Vincular Strava</span></a>
                                @endif
                              </div> --}}

                              @include('desafios_card', ['full' => false])
                            </div>
                          </div>

                        </div>
                        @else
                        @if(!(\Request::is('login') || \Request::is('register') || \Request::is('/')))
                        <div class="col-md-12">
                          @include('desafios_card', ['full' => true])
                        </div>
                        @endif
                        @endif
                        <div class="@if(!Auth::guest()) col-md-9 @else col-md-12 @endif">
                          @yield('content')
                        </div>{{-- 
                        <div class="col-md-3">
                          @extends('layouts.adsense')
                        </div> --}}
                      </div>
                    </main>
                    <footer class="footer">
                      <div class="container">
                        <strong>Copyright © 2019 <a target="_blank"  href="/home">Desafio 300 dias</a>.</strong> Todos os Direitos Reservados.<a href="{{url('/')}}"></a>
                        <div class="float-right"> <strong>Desenvolvido por: <a href="mailto:gfreire@ufmg.br">Guilherme Freire</a></strong>
                        </div>
                      </div>
                    </footer>
                  </div>
                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                  @yield('scripts')
                  <!-- Global site tag (gtag.js) - Google Analytics -->
                  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136786696-1"></script>
                  <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', 'UA-136786696-1');
                  </script>
                </body>
                </html>

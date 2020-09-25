@extends('layouts.user')
@section('styles')
<link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    
                    @include('layouts.errors')
                    <div class="col-md-12 row-block mb-3">
                        <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                            <strong>Login com Facebook</strong>
                        </a>     
                    </div>
  {{--                  <BR>
                     <div class="col-md-12 row-block">
                        <a href="{{ url('auth/strava') }}" class="btn btn-lg btn-primary btn-block">
                            <strong>Login com Strava</strong>
                        </a>     
                    </div> 
                    <BR>--}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>
{{-- 
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                     Lembrar
                                 </label>
                             </div>
                         </div>
                     </div> --}}

                     <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                        </div>
                        <div class="col-md-8 offset-md-4">
                         <a class="btn btn-link" href="{{ route('password.request') }}">
                            Esqueceu sua senha
                        </a>

                    </div>
                    <div class="col-md-8 offset-md-4">

                        <a class="btn btn-link" href="{{ route('register') }}">
                            Registrar-se com email
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection

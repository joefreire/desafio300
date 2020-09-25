@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/datepicker/datepicker3.css') }}">
<link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
@endsection
@section('content')



<div class="card">
    <div class="card-header">Perfil</div>

    <div class="card-body">
        @if(empty(\Auth::user()->strava_id))
        <div class="col-md-12 row-block">
            <a href="{{ url('auth/strava') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Sincronizar Strava</strong>
            </a>     
        </div>
        @endif
        <form method="POST" action="{{route('salvaPerfil')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="image">Foto</label>
                    <input id="image" name="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="mb-xs">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{Auth::user()->nome}}">
                </div>
                <div class="col-md-6">
                    <label class="mb-xs">Email</label>
                    <input type="text" class="form-control" name="nome" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="mb-xs">Peso</label>
                    <div class="input-group">
                        <input type="number" step="0.01" max="500.00" class="form-control" name="peso" value="{{Auth::user()->peso()}}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">KG</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="mb-xs">Altura</label>
                    <div class="input-group">
                        <input type="number" step="0.01" max="2.50" class="form-control" name="altura" value="{{Auth::user()->altura}}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">M</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="mb-xs">Data Nascimento</label>
                    <input type="text" class="form-control datepicker" name="dt_nascimento" autocomplete="off" value="{{Auth::user()->dt_nascimento}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" >   
                    </select>  

                </div>

                <div class="col-md-4">
                    <label for="cidade">Cidade</label> 
                    <select id="cidade" name="cidade" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" >   
                        <option value="">Selecione um Estado</option>

                    </select>      
                </div>
            </div>
            <BR>
            <div class="card">
              <div class="card-header">Alterar senha</div>
              <div class="card-body row">
                <div class="col-md-6">
                    <label for="password" >Nova Senha</label><input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                </div>


                <div class="col-md-6">
                    <label for="password-confirm" >Confirmar Nova Senha</label><input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                </div>
            </div>
        </div>

        <BR>
        <button type="submit" class="btn btn-default float-rigth">Salvar</button>
    </form>
</div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/cidades-estados-1-4.js') }}"></script>
<script src="{{ asset('libs/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
    new dgCidadesEstados({
        estado: document.getElementById('estado'),
        cidade: document.getElementById('cidade')
    })
    @if(!empty(Auth::user()->estado))
    $("#estado").val("{{Auth::user()->estado}}").trigger("change");
    @endif
    @if(!empty(Auth::user()->cidade))
    $("#cidade").val("{{Auth::user()->cidade}}").trigger("change");
    @endif

    $( document ).ready(function() {
        $('.datepicker').mask('00/00/0000');
        $('.datepicker').datepicker({
            todayHighlight: true,
            language: "pt-BR",
            format: 'dd/mm/yyyy',
            minDate: '01/01/1900',
            autoclose: true
        });

    });
</script>

@endsection
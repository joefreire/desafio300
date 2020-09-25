@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/datepicker/datepicker3.css') }}">
<link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
@endsection
@section('content')



<div class="card">
    <div class="card-header"><h2>Gerar novo treinamento</h2></div>

    <div class="card-body">

        <form method="POST" action="{{route('salvaPerfil')}}" enctype="multipart/form-data">
            @csrf
            <div class="callout callout-danger">
                <p>While Bootstrap will apply these styles in all browsers, Internet Explorer 11 and below don’t fully support the <code class="highlighter-rouge">disabled</code> attribute on a <code class="highlighter-rouge">&lt;fieldset&gt;</code>. Use custom JavaScript to disable the fieldset in these browsers.</p>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="objetivo_principal">Objetivo Principal</label>
                    <select id="objetivo_principal" name="objetivo_principal" class="form-control{{ $errors->has('objetivo_principal') ? ' is-invalid' : '' }}" >  
                        <option ></option> 
                        <option value="completar">Completar</option>
                        <option value="tempo">Tempo</option>
                        <option value="peso">Perder Peso</option>
                    </select> 
                    <div class="small text-mutted">
                        O que você busca com esse treinamento?
                    </div> 
                </div>
                <div class="col-md-3">
                    <label class="mb-xs">Distância</label>
                    <select id="objetivo_distancia" name="objetivo_distancia" class="form-control{{ $errors->has('objetivo_distancia') ? ' is-invalid' : '' }}" >  
                        <option ></option> 
                        <option value="5km">5 km</option>
                        <option value="10km">10 km</option>
                        <option value="21km">21 km</option>
                        <option value="42km">42 km</option>
                    </select>  
                    <div class="small text-mutted">
                       Qual distância você pretende correr?
                   </div> 
               </div>
               <div class="col-md-3">
                <label class="mb-xs">Tempo</label>
                <div class="input-group">
                    <select id="objetivo_tempo_hora" name="objetivo_tempo_hora" class="form-control{{ $errors->has('objetivo_tempo_hora') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 9; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select> 
                    <select id="objetivo_tempo_min" name="objetivo_tempo_min" class="form-control{{ $errors->has('objetivo_tempo_min') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <select id="objetivo_tempo_seg" name="objetivo_tempo_seg" class="form-control{{ $errors->has('objetivo_tempo_seg') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                </div>
                <div class="small text-mutted">
                    Em qual tempo?   (Horas:minutos:segundos)
                </div> 
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="mb-xs">Maior distância já completada?</label>
                <select id="objetivo_distancia" name="objetivo_distancia" class="form-control{{ $errors->has('objetivo_distancia') ? ' is-invalid' : '' }}" >  
                    <option ></option> 
                    <option value="5km">5 km</option>
                    <option value="10km">10 km</option>
                    <option value="21km">21 km</option>
                    <option value="42km">42 km</option>
                    <option value="Ultra">Ultra</option>
                </select>  
                <div class="small text-mutted">
                    Maior distância que você já correu
                </div> 
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="mb-xs">Melhor Tempo 5km</label>
                <div class="input-group">
                    <select id="objetivo_tempo_hora" name="objetivo_tempo_hora" class="form-control{{ $errors->has('objetivo_tempo_hora') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 9; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select> 
                    <select id="objetivo_tempo_min" name="objetivo_tempo_min" class="form-control{{ $errors->has('objetivo_tempo_min') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <select id="objetivo_tempo_seg" name="objetivo_tempo_seg" class="form-control{{ $errors->has('objetivo_tempo_seg') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <div class="small text-mutted">
                        Recorde Pessoal na distância   (Horas:minutos:segundos)
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Melhor Tempo 10km</label>
                <div class="input-group">
                    <select id="objetivo_tempo_hora" name="objetivo_tempo_hora" class="form-control{{ $errors->has('objetivo_tempo_hora') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 9; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select> 
                    <select id="objetivo_tempo_min" name="objetivo_tempo_min" class="form-control{{ $errors->has('objetivo_tempo_min') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <select id="objetivo_tempo_seg" name="objetivo_tempo_seg" class="form-control{{ $errors->has('objetivo_tempo_seg') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <div class="small text-mutted">
                        Recorde Pessoal na distância   (Horas:minutos:segundos)
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Melhor Tempo 21km</label>
                <div class="input-group">
                    <select id="objetivo_tempo_hora" name="objetivo_tempo_hora" class="form-control{{ $errors->has('objetivo_tempo_hora') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 9; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select> 
                    <select id="objetivo_tempo_min" name="objetivo_tempo_min" class="form-control{{ $errors->has('objetivo_tempo_min') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <select id="objetivo_tempo_seg" name="objetivo_tempo_seg" class="form-control{{ $errors->has('objetivo_tempo_seg') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>
                    <div class="small text-mutted">
                        Recorde Pessoal na distância   (Horas:minutos:segundos)
                    </div>   
                </div>
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Melhor Tempo 42km</label>
                <div class="input-group">
                    <select id="objetivo_tempo_hora" name="objetivo_tempo_hora" class="form-control{{ $errors->has('objetivo_tempo_hora') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 9; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select> 
                    <select id="objetivo_tempo_min" name="objetivo_tempo_min" class="form-control{{ $errors->has('objetivo_tempo_min') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <select id="objetivo_tempo_seg" name="objetivo_tempo_seg" class="form-control{{ $errors->has('objetivo_tempo_seg') ? ' is-invalid' : '' }}" >  
                        @for ($i = 0; $i < 60; $i++)
                        <option value="{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}">{{ str_pad($i , 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                    </select>  
                    <div class="small text-mutted">
                        Recorde Pessoal na distância   (Horas:minutos:segundos)
                    </div> 
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-3">
                <label class="mb-xs">Peso</label>
                <div class="input-group">
                    <input type="number" step="0.01" max="500.00" class="form-control" name="peso" value="{{Auth::user()->peso()}}">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">KG</span>
                    </div>
                </div>
                <div class="small text-mutted">
                    Seu peso atual
                </div> 
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Altura</label>
                <div class="input-group">
                    <input type="number" step="0.01" max="2.50" class="form-control" name="altura" value="{{Auth::user()->altura}}">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">M</span>
                    </div>
                </div>
                <div class="small text-mutted">
                    Altura Atual
                </div> 
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Data Nascimento</label>
                <input type="text" class="form-control datepicker" name="dt_nascimento" autocomplete="off" value="{{Auth::user()->dt_nascimento}}">
                <div class="small text-mutted">
                    Data do seu nascimento
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" >   
                </select>  
                <div class="small text-mutted">
                    Estado de residência
                </div> 
            </div>

            <div class="col-md-3">
                <label for="cidade">Cidade</label> 
                <select id="cidade" name="cidade" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" >   
                    <option value="">Selecione um Estado</option>

                </select>     
                <div class="small text-mutted">
                    Cidade de residência
                </div>  
            </div>
        </div>
        <div class="callout callout-danger mt-3">
            <p>While Bootstrap will apply these styles in all browsers, Internet Explorer 11 and below don’t fully support the <code class="highlighter-rouge">disabled</code> attribute on a <code class="highlighter-rouge">&lt;fieldset&gt;</code>. Use custom JavaScript to disable the fieldset in these browsers.</p>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="mb-xs">Peso</label>
                <div class="input-group">
                    <input type="number" step="0.01" max="500.00" class="form-control" name="peso" value="{{Auth::user()->peso()}}">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">KG</span>
                    </div>
                </div>
                <div class="small text-mutted">
                    Seu peso atual
                </div> 
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Altura</label>
                <div class="input-group">
                    <input type="number" step="0.01" max="2.50" class="form-control" name="altura" value="{{Auth::user()->altura}}">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">M</span>
                    </div>
                </div>
                <div class="small text-mutted">
                    Altura Atual
                </div> 
            </div>
            <div class="col-md-3">
                <label class="mb-xs">Data Nascimento</label>
                <input type="text" class="form-control datepicker" name="dt_nascimento" autocomplete="off" value="{{Auth::user()->dt_nascimento}}">
                <div class="small text-mutted">
                    Data do seu nascimento
                </div> 
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-default float-rigth">GERAR TREINAMENTO</button>
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
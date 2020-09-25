
@extends('layouts.user')
@section('styles')

@endsection
@section('content')

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{$desafio->nome}}</div>

                <div class="card-body" id="desafios">

                  <?php
                  $userDesafio = \App\DesafioUser::where('user_id',Auth::id())->where('medalha_id',$desafio->id)->first();
                  ?>
                  @if(!empty($userDesafio))
                  @if($userDesafio->concluido == 'Sim')
                  <div class="tag">Concluído</div>
                  @else
                  <div class="tag">Ingressou</div>
                  @endif
                  @endif
                  <div class="container-fluid">
                    <div class="challenge-logo">
                      <img src="{{$desafio->imagem}}" class="img-responsive center-block" style="
                      display: block;
                      margin-left: auto;
                      margin-right: auto;
                      max-height:150px;
                      max-width: 150px;
                      padding-bottom: 30px;
                      ">
                  </div>

                  <div class="challenge-type">
                      {{$desafio->quantidade}} {{$desafio->tipo}}
                  </div>
                  <h3 class="text-headline">
                     {{$desafio->nome}}
                 </h3>
                 <div class="challenge-description">{!!$desafio->descricao_completa!!}</div>
                 @if(Auth::guest())
                 <a href="{{url('/')}}" class="btn btn-sm btn-success" >Entre no desafio 300 para participar</a>
                 <br><BR>
                 @else
                 @if(empty(\App\DesafioUser::where('user_id',Auth::id())->where('medalha_id',$desafio->id)->first()))
                 <form action="{{route('participaDesafio')}}" method="post">
                    @csrf
                    <input type="hidden" name="desafio_id" value="{{$desafio->id}}">
                    <input type="submit" class="btn btn-sm btn-success" value="Participar">
                </form>  
                <BR><BR>  
                <div class="challenge-timespan">
                    Começa {{ \Carbon\Carbon::createFromFormat('d/m/Y', $desafio->periodo_inicio)->diffForHumans()}}
                </div>                               
                @else
                @if(!empty($userDesafio))
                <div class="progress">

                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }}%" aria-valuenow="{{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }}" aria-valuemin="0" aria-valuemax="100">{{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }} %</div>

                </div>
                @endif   
                @endif   
                @endif   
                @if(!empty($userDesafio))
                @if($userDesafio->concluido == 'Não')
                <div class="challenge-timespan">
                    Acaba {{ \Carbon\Carbon::createFromFormat('d/m/Y', $desafio->periodo_fim)->diffForHumans()}}
                </div>   
                @else
                <div class="challenge-timespan">
                    Terminou em {{$userDesafio->updated_at}}
                </div>   
                @endif                       
                @endif     
                <div class="content">    {!!$desafio->texto_completo!!}     </div>

            </div>
            <div class="card">
                <div class="card-header">Participantes</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($usersDesafio as $userDesafio)    
                        <div class="col-md-2 col-sm-2">                
                            <img src="{{($userDesafio->user->avatar == null?asset('/img/default.jpg'):$userDesafio->user->avatar)}}" class="rounded-circle img-thumbnail"style="
                            width: 110px;
                            height: 110px;
                            ">
                            <h5>{{$userDesafio->user->nome}}</h5>
                            <p>@if(!empty($userDesafio->user->cidade) && !empty($userDesafio->user->estado))<i class="fa fa-map-marker" aria-hidden="true"></i> {{$userDesafio->user->cidade}}, {{$userDesafio->user->estado}}.@endif</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
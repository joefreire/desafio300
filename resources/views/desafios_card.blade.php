<div class="card">
  <div class="card-header">Desafios Abertos</div>
  <div class="card-body @if($full) row @endif" id="desafios">

    @foreach($desafios as $desafio)

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
    @if($full)
    <div class="@if(count($desafios) >= 4) col-md-3 @elseif(count($desafios) >= 3) col-md-4 @elseif(count($desafios) >= 2) col-md-6  @elseif(count($desafios) >= 1)  col-md-12 @endif">
     @else 
     <div class="container-fluid">
      @endif
      <div class="challenge-logo">
        <img src="{{$desafio->imagem}}" class="img-responsive center-block" style="max-width: 100px; max-height: 100px; margin: 0 auto; display: block;">
      </div>
      <div class="challenge-type">
        {{$desafio->quantidade}} {{$desafio->tipo}}
      </div>
      <h3 class="text-headline">
        <a href="{{url('/desafio/ver').'/'.$desafio->slug}}">{{$desafio->nome}}</a>
      </h3>
      <div class="challenge-description">{{$desafio->texto}}</div>
      @if(!Auth::guest() && empty(\App\DesafioUser::where('user_id',Auth::id())->where('medalha_id',$desafio->id)->first()))
      <form action="{{route('participaDesafio')}}" method="post">
        @csrf
        <input type="hidden" name="desafio_id" value="{{$desafio->id}}">
        <input type="submit" class="btn btn-sm btn-success" value="Participar">
      </form>  
      <BR><BR>  
      <div class="challenge-timespan">
        Começa {{ \Carbon\Carbon::parse($desafio->periodo_inicio)->diffForHumans()}}
      </div>                               
      @else
      @if(!empty($userDesafio))
      <div class="progress">

        <div class="progress-bar bg-success" role="progressbar" style="width: {{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }}%" aria-valuenow="{{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }}" aria-valuemin="0" aria-valuemax="100">{{ \App\Medalhas::find($desafio->id)->verificaAndamento(\Auth::id()) }} %</div>

      </div>
      @endif   
      @endif   
      @if(!empty($userDesafio))
      @if($userDesafio->concluido == 'Não')
      <div class="challenge-timespan">
        Acaba {{ \Carbon\Carbon::parse($desafio->periodo_fim)->diffForHumans()}}
      </div>   
      @else
      <div class="challenge-timespan">
        Terminou em {{$userDesafio->updated_at}}
      </div>   
      @endif                       
      @endif                       
    </div>
    @if(!$full)
    <hr>
    @endif
    @endforeach
  </div>
</div>
<hr>
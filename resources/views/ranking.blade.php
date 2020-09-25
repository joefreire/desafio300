@extends('layouts.user')
@section('styles')

<style type="text/css">


	.atividade{
		padding: 0.5rem!important;
	}
</style>

@endsection
@section('content')


<div class="card">
	<div class="card-header"><i class="fas fa-trophy"></i> Ranking {{date('Y')}}</div>

	<div class="card-body row">
		<div class="col-md-4">
			<table class="table table-striped table-hover">
				<tbody>
					<thead class="thead-light">
						<tr>
							<th scope="col" colspan="3" style="text-align: center; vertical-align: middle;">Ranking por Distância</th>
						</tr>
					</thead>
					@foreach($distancia as $ranking => $atividade)
					<tr>
						<td style="text-align: center; vertical-align: middle;">@if($ranking == 0)<img src="{{asset('img/medal.png')}}" alt="Primeiro Colocado">@elseif($ranking==1)<img src="{{asset('img/silver-medal.png')}}" alt="Segundo Colocado">@elseif($ranking==2)<img src="{{asset('img/bronze-medal_3.png')}}" alt="Terceiro Colocado">@else {{$ranking+1}} @endif</td>
						<td><img src="{{!empty($atividade->user->avatar)?$atividade->user->avatar:asset('img/avatar.jpg')}}" class="rounded-circle img-thumbnail" style="width: 80px;height: 80px;" alt="{{$atividade->user->nome}}"> {{$atividade->user->nome}}</td>
						<td style="text-align: center; vertical-align: middle;">{{$atividade->distancia}} KMs</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover">
				<tbody>
					<thead class="thead-light">
						<tr>
							<th scope="col" colspan="3" style="text-align: center; vertical-align: middle;">Ranking por Tempo</th>
						</tr>
					</thead>
					@foreach($tempo as $ranking => $atividade)
					<tr>
						<td style="text-align: center; vertical-align: middle;">@if($ranking == 0)<img src="{{asset('img/medal.png')}}" alt="Primeiro Colocado">@elseif($ranking==1)<img src="{{asset('img/silver-medal.png')}}" alt="Segundo Colocado">@elseif($ranking==2)<img src="{{asset('img/bronze-medal_3.png')}}" alt="Terceiro Colocado">@else {{$ranking+1}} @endif</td>
						<td><img src="{{!empty($atividade->user->avatar)?$atividade->user->avatar:asset('img/avatar.jpg')}}" class="rounded-circle img-thumbnail" style="width: 80px;height: 80px;" alt="{{$atividade->user->nome}}"> {{$atividade->user->nome}}</td>
						<td style="text-align: center; vertical-align: middle;">{{\App\Atividade::secondsToTime($atividade->tempo)}}</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover">
				<tbody>
					<thead class="thead-light">
						<tr>
							<th scope="col" colspan="3" style="text-align: center; vertical-align: middle;">Ranking por Sequência de Atividades</th>
						</tr>
					</thead>
					@foreach($sequencia as $ranking => $atividade)
					<tr>
						<td style="text-align: center; vertical-align: middle;">@if($ranking == 0)<img src="{{asset('img/medal.png')}}" alt="Primeiro Colocado">@elseif($ranking==1)<img src="{{asset('img/silver-medal.png')}}" alt="Segundo Colocado">@elseif($ranking==2)<img src="{{asset('img/bronze-medal_3.png')}}" alt="Terceiro Colocado">@else {{$ranking+1}} @endif</td>
						<td><img src="{{!empty($atividade->user->avatar)?$atividade->user->avatar:asset('img/avatar.jpg')}}" class="rounded-circle img-thumbnail" style="width: 80px;height: 80px;" alt="{{$atividade->user->nome}}"> {{$atividade->user->nome}}</td>
						<td style="text-align: center; vertical-align: middle;">{{$atividade->dias}} Dias</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@section('scripts')



@endsection
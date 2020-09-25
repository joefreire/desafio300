@extends('layouts.user')
@section('styles')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />

<style type="text/css">

	.card{margin-top:12px;margin-bottom:12px}.feed-entry .entry-block,.feed-entry .entry-header,.feed-entry .entry-body,.feed-entry .entry-media,.feed-entry .entry-footer{margin-top:8px;margin-bottom:8px}.feed-entry .entry-block:first-of-type,.feed-entry .entry-header:first-of-type,.feed-entry .entry-body:first-of-type,.feed-entry .entry-media:first-of-type,.feed-entry .entry-footer:first-of-type{padding-top:16px;margin-top:0;}.feed-entry .entry-block:last-of-type,.feed-entry .entry-header:last-of-type,.feed-entry .entry-body:last-of-type,.feed-entry .entry-media:last-of-type,.feed-entry .entry-footer:last-of-type{padding-bottom:16px;margin-bottom:0}@media (max-width: 480px){.feed-entry .entry-block:first-of-type,.feed-entry .entry-header:first-of-type,.feed-entry .entry-body:first-of-type,.feed-entry .entry-media:first-of-type,.feed-entry .entry-footer:first-of-type{padding-top:12px}.feed-entry .entry-block:last-of-type,.feed-entry .entry-header:last-of-type,.feed-entry .entry-body:last-of-type,.feed-entry .entry-media:last-of-type,.feed-entry .entry-footer:last-of-type{padding-bottom:12px}}.feed-entry .entry-body{padding-right:88px;margin-bottom:16px}.feed h3{margin-bottom:8px}.images-1-up .activity-map .entry-image-wrapper{height:181.33px}.feed .group-activity .group-activity-map{height:181.33px}.feed-entry .list-entries>li{margin-top:0;margin-bottom:0}.feed-entry .child-entry .entry-header{margin-bottom:0;padding-top:12px}
	.list-stats {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		-ms-flex-direction: row;
		flex-direction: row;
		-webkit-box-align: stretch;
		-ms-flex-align: stretch;
		align-items: stretch;
		list-style: none;
		margin-bottom: 0;
		padding-left: 0;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		list-style: none;
	}
	.list-stats li {
		margin-left: 0;
		margin-right: 16px;
		padding-right: 16px;
		position: relative;
		margin-bottom: 0.75em;
		display: flex;
		box-sizing: border-box;
	}
	.list-stats .stat:last-child {
		margin-right: 0;
	}
	.list-stats .stat{
		margin-right: 0;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		-webkit-box-pack: end;
		-ms-flex-pack: end;
		justify-content: flex-end;

	}
	.atividade{
		padding: 0rem!important;
	}
</style>
<script src='//api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>

@endsection
@section('content')


<div class="card">
	<div class="card-header">Atividades<div class="float-right"><a href="{{route('novaAtividade')}}" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Nova Atividade Manual</a></div></div>

	<div class="card-body p-1">
		@if(\App\Atividade::total() == 0)
		<h2>Você ainda não tem atividades no desafio</h2>
		@if(empty(\Auth::user()->strava_id))
		<div class="col-md-12 row-block">
			<a href="{{ url('auth/strava') }}" class="btn btn-lg btn-primary btn-block">
				<strong>Faça Login com o Strava para sincronizar suas atividades</strong>
			</a>     
		</div>
		<BR>
		@endif
		@else
		@foreach($atividades as $atividade)
		@if($atividade->strava_activity != null)
		<div class="card-body atividade">
			<div class="card">
				<div class="card-header">                    
					<a href="//www.strava.com/activities/{{$atividade->strava_activity}}" target="_blank">
						@switch($atividade->type)
						@case('Run')
						<i class="fas fa-running"></i> 
						@break
						@case('Ride')
						<i class="fas fa-bicycle"></i>
						@break
						@case('Swim')
						<i class="fas fa-swimmer"></i>
						@break
						@case('Hike')
						<i class="fas fa-hiking"></i>
						@break
						@case('WeightTraining')
						<i class="fas fa-dumbbell"></i>
						@break
						@case('Workout')
						<i class="fas fa-dumbbell"></i>
						@break
						@endswitch
						{{$atividade->name}}
					</a>
					<div class="float-right">
						STRAVA
						<a href="{{route('editarAtividade',$atividade->id)}}"><span class="fa fa-edit"></span> Editar </a> 
						<a href="{{route('deletarAtividade',$atividade->id)}}"><span class="fa fa-trash"></span> Remover </a> 
					</div>
				</div>
				<div class="card-body atividade">
					<div class="media-body p-2">
						<div class="media">
							<div class="media-body">
								<ul class="list-stats">
									<li>
										<div class="stat">
											<div class="stat-subtext">Data</div>
											<b class="stat-text">{{$atividade->start_date_local}}</b>
										</div>
									</li>
									<li>
										<div class="stat">
											<div class="stat-subtext">Distância</div>
											<b class="stat-text">{{$atividade->distance}}<abbr class="unit" title="quilômetros"> km</abbr></b>
										</div>
									</li>

									@if($atividade->total_elevation_gain>0)
									<li>
										<div class="stat">
											<div class="stat-subtext">Ganho de elevação</div>
											<b class="stat-text">{{$atividade->total_elevation_gain}}<abbr class="unit" title="metros"> m</abbr></b>
										</div>
									</li>
									@endif
									<li>
										<div class="stat">
											<div class="stat-subtext">Tempo</div>
											<b class="stat-text">{{gmdate("H:i:s", $atividade->elapsed_time )}}</b>
										</div>
									</li>
									@if($atividade->calories > 0)
									<li>
										<div class="stat">
											<div class="stat-subtext">Calorias</div>
											<b class="stat-text">{{$atividade->calories}}</b>
										</div>
									</li>
									@endif
									<li>
										<div class="stat">
											<div class="stat-subtext">Desafio 300</div>
											<b class="stat-text">{{\App\Atividade::contaDiasAteAtividade($atividade->id)}}/300</b>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
					@if($atividade->map_polyline != null && $atividade->map_polyline != '' && !empty($atividade->map_polyline) && strlen($atividade->map_polyline) > 3)
					
					<div class="embed-responsive">

						<a href="//www.strava.com/activities/{{$atividade->strava_activity}}"  target="_blank">
							
							<div id='map_{{$atividade->strava_activity}}' style='width: 100%; height: 300px;'></div>
							<script>
	
									mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VpZnJlaXJlIiwiYSI6ImNrMXZkaDJ2azBkaTkzbWxvY3c3OGFmbjgifQ.z1J5JM5H3q7sXvQWNL2rgg';
									teste = '{{$atividade->start_latlng}}'
									var map_{{$atividade->strava_activity}} = new mapboxgl.Map({
										container: 'map_{{$atividade->strava_activity}}',
										style: 'mapbox://styles/mapbox/streets-v11',
										center: [{{$atividade->LngStart}},{{$atividade->LatStart}}],
										zoom: 12,
									});
									map_{{$atividade->strava_activity}}.on('load', function () {

										map_{{$atividade->strava_activity}}.addLayer({
											"id": "route",
											"type": "line",
											"source": {
												"type": "geojson",
												"data": {
													"type": "Feature",
													"properties": {},
													"geometry": {
														"type": "LineString",
														"coordinates": 
														{!!json_encode($atividade->coordenadas)!!}
														
													}
												}
											},
											"layout": {
												"line-join": "round",
												"line-cap": "round"
											},
											"paint": {
												"line-color": "#888",
												"line-width": 8
											}
										});
									});
								
							</script>
						</a>


					</div>
					@endif
				</div>
			</div>


		</div>
		@else
		<div class="card-body atividade">
			<div class="card">
				<div class="card-header">                    
					@switch($atividade->type)
					@case('Run')
					<i class="fas fa-running"></i> 
					@break
					@case('Ride')
					<i class="fas fa-bicycle"></i>
					@break
					@case('Swim')
					<i class="fas fa-swimmer"></i>
					@break
					@case('Hike')
					<i class="fas fa-hiking"></i>
					@break
					@case('WeightTraining')
					<i class="fas fa-dumbbell"></i>
					@break
					@case('Workout')
					<i class="fas fa-dumbbell"></i>
					@break
					@endswitch
					{{$atividade->name}}

					<div class="float-right">
						MANUAL 
						<a href="{{route('editarAtividade',$atividade->id)}}"><span class="fa fa-edit"></span> Editar </a> 
						<a href="{{route('deletarAtividade',$atividade->id)}}"><span class="fa fa-trash"></span> Remover </a> 
					</div>
				</div>
				<div class="card-body">
					<div class="media-body">
						<div class="media">
							<div class="media-body">
								<ul class="list-stats">
									<li>
										<div class="stat">
											<div class="stat-subtext">Data</div>
											<b class="stat-text">{{$atividade->start_date_local}}</b>
										</div>
									</li>
									<li>
										<div class="stat">
											<div class="stat-subtext">Distância</div>
											<b class="stat-text">{{$atividade->distance}}<abbr class="unit" title="quilômetros"> km</abbr></b>
										</div>
									</li>
									<li>
										<div class="stat">
											<div class="stat-subtext">Tempo</div>
											<b class="stat-text">{{gmdate("H:i:s", $atividade->elapsed_time )}}</b>
										</div>
									</li>
									@if($atividade->calories > 0)
									<li>
										<div class="stat">
											<div class="stat-subtext">Calorias</div>
											<b class="stat-text">{{$atividade->calories}}</b>
										</div>
									</li>
									@endif
									<li>
										<div class="stat">
											<div class="stat-subtext">Desafio 300</div>
											<b class="stat-text">{{\App\Atividade::contaDiasAteAtividade($atividade->id)}}/300</b>
										</div>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
		@endif  
	</div>
</div>

@endsection
@section('scripts')



@endsection
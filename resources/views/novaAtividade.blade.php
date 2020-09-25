@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/datepicker/datepicker3.css') }}">
<link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
@endsection
@section('content')


<div class="card">
	<div class="card-header">Nova Atividade</div>

	<div class="card-body">


		<form method="POST" action="{{route('salvaAtividade')}}">
			<input type="hidden" class="form-control" name="id" value="{{ old('id')}}">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<label for="nome">Data da Atividade</label>
					<input type="text" class="datepicker form-control" name="start_date_local" autocomplete="off" value="{{ old('start_date_local')}}">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label class="mb-xs">Tipo Atividade</label>
					<select class="form-control" name="tipo_atividade" id="tipo_atividade">
						<option  value="">
						</option>
						<option  value="Ride">
							Ciclismo
						</option>
						<option value="Run">
							Corrida
						</option>
						<option value="Swim">
							Natação
						</option>
						<option value="Hike">
							Trote
						</option>
						<option value="Walk">
							Caminhada
						</option>
						<option value="VirtualRide">
							Bicicleta Ergometrica
						</option>
						<option value="VirtualRun">
							Esteira
						</option>
						<option value="WeightTraining">
							Treinamento com peso
						</option>
						<option value="Workout">
							Treino
						</option>
						<option value="Yoga">
							Ioga
						</option>
						<option value="Elliptical">
							Elíptico
						</option>
						<option value="AlpineSki">
							Esqui alpino
						</option>
						<option value="BackcountrySki">
							Esqui fora de pista
						</option>
						<option value="Canoeing">
							Canoagem
						</option>
						<option value="Crossfit">
							Crossfit
						</option>
						<option value="EBikeRide">
							Ciclismo de bicicleta elétrica
						</option>
						<option value="StairStepper">
							Escada
						</option>
						<option value="Handcycle">
							Handbike
						</option>
						<option value="IceSkate">
							Patinação no gelo
						</option>
						<option value="InlineSkate">
							Patinação inline
						</option>
						<option value="Kayaking">
							Caiaquismo
						</option>
						<option value="Kitesurf">
							Kitesurf
						</option>
						<option value="NordicSki">
							Esqui nórdico
						</option>
						<option value="RockClimbing">
							Escalada em rochas
						</option>
						<option value="RollerSki">
							Esqui de rodas
						</option>
						<option value="Rowing">
							Remo
						</option>
						<option value="Snowboard">
							Snowboard
						</option>
						<option value="Snowshoe">
							Raquete de neve
						</option>

						<option value="StandUpPaddling">
							Stand Up Paddle
						</option>
						<option value="Surfing">
							Surf
						</option>
						<option value="Velomobile">
							Velomobile
						</option>
						<option value="Wheelchair">
							Cadeira de rodas
						</option>
						<option value="Windsurf">
							Windsurf
						</option>

					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="nome">Nome da Atividade</label>
				<input type="text" class="form-control" name="nome" value="{{ old('name')}}">
			</div>
			<div class="row">
				<div class="col-md-12">
					<label class="mb-xs">Duração da Atividade</label>
					<div class="input-group">

						<input type="number" class="form-control hora_" min="0" name="hora"  id="hora" placeholder="horas" maxlength="3" value="{{ (old('elapsed_time'))?gmdate("H", old('elapsed_time')):''}}">

						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">:</span>
						</div>
						<input type="number" class="form-control min_" min="0" name="minutos" id="minutos" placeholder="minutos" maxlength="2" value="{{ (old('elapsed_time'))?gmdate("i", old('elapsed_time')):''}}">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">:</span>
						</div>
						<input type="number" class="form-control min_" min="0" name="segundos" placeholder="segundos" maxlength="2" value="{{ (old('elapsed_time'))?gmdate("s", old('elapsed_time')):''}}">
					</div>
				</div>
				<div class="col-md-6">
					<label class="mb-xs">Distância</label>
					<div class="input-group">
						<input type="number" step="0.01" min="0" class="form-control hora_" name="distance" id="distance" value="{{ (old('distance')?old('distance'):'0.00')}}">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">KM</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 paceGroup" style="display: none;">
					<label class="mb-xs">Pace (min/km)</label>
					<div class="input-group">

						<input type="number" class="form-control pace" id="minutos_pace" disabled="">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">:</span>
						</div>
						<input type="number" class="form-control " id="segundos_pace" disabled="">
					</div>
				</div>
			</div>
			<BR>
			<button type="submit" class="btn btn-default">Salvar Atividade Manual</button>
		</form>
	</div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('libs/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script type="text/javascript">
	@if(!empty(old('type')))
	$("#tipo_atividade").val("{{old('type')}}").trigger("change");
	@endif
	$( document ).ready(function() {
		$('.datepicker').mask('00/00/0000');
		$('.datepicker').datepicker({
			todayHighlight: true,
			language: "pt-BR",
			format: 'dd/mm/yyyy',
			startDate: '01/01/2019',
			minDate: '01/01/2019',
			endDate: 'now',
			maxDate: new Date(),
			autoclose: true
		});

		function getPace() {
			var distance = parseFloat($('#distance').val());
			var tempoTotal = (parseInt($('#hora').val())*60)+parseInt($('#minutos').val());
			var pace = tempoTotal/distance;
			pace = pace.toFixed(2);
			var pace = pace.toString().split('.');
			minPace = pace[0];
			var secPace = parseFloat('0.'+pace[1])*60;

			var result = [minPace, secPace.toFixed(0)];
			return result;
    	}
    	$('#tipo_atividade').on('change', function(e) {
    		if(
    			$('#tipo_atividade').val() == 'Run' || $('#tipo_atividade').val() == 'Hike' || $('#tipo_atividade').val() == 'Walk' || $('#tipo_atividade').val() == 'VirtualRun'
    			&& ($('#hora').val() > 0 || $('#minutos').val() > 0 ) && $('#distance').val() > 0 )
    		{
    			var resultado = getPace();
    			$('#minutos_pace').val(resultado[0])
    			$('#segundos_pace').val(resultado[1])
    			$('.paceGroup').show()
    		}else{
    			$('#minutos_pace').val('00')
    			$('#segundos_pace').val('00')
    			$('.paceGroup').hide()
    		}
    	});
    	$('#distance').on('change', function(e) {
    		if(
    			$('#tipo_atividade').val() == 'Run' || $('#tipo_atividade').val() == 'Hike' || $('#tipo_atividade').val() == 'Walk' || $('#tipo_atividade').val() == 'VirtualRun'
    			&& ($('#hora').val() > 0 || $('#minutos').val() > 0 ) && $('#distance').val() > 0 )
    		{
    			var resultado = getPace();
    			$('#minutos_pace').val(resultado[0])
    			$('#segundos_pace').val(resultado[1])
    			$('.paceGroup').show()
    		}else{
    			$('#minutos_pace').val('00')
    			$('#segundos_pace').val('00')
    			$('.paceGroup').hide()
    		}
    	});
    	$('#hora').on('change', function(e) {
    		if(
    			$('#tipo_atividade').val() == 'Run' || $('#tipo_atividade').val() == 'Hike' || $('#tipo_atividade').val() == 'Walk' || $('#tipo_atividade').val() == 'VirtualRun'
    			&& ($('#hora').val() > 0 || $('#minutos').val() > 0 ) && $('#distance').val() > 0 )
    		{
    			var resultado = getPace();
    			$('#minutos_pace').val(resultado[0])
    			$('#segundos_pace').val(resultado[1])
    			$('.paceGroup').show()
    		}else{
    			$('#minutos_pace').val('00')
    			$('#segundos_pace').val('00')
    			$('.paceGroup').hide()
    		}
    	});
    	$('#minutos').on('change', function(e) {
    		if(
    			$('#tipo_atividade').val() == 'Run' || $('#tipo_atividade').val() == 'Hike' || $('#tipo_atividade').val() == 'Walk' || $('#tipo_atividade').val() == 'VirtualRun'
    			&& ($('#hora').val() > 0 || $('#minutos').val() > 0 ) && $('#distance').val() > 0 )
    		{
    			var resultado = getPace();
    			$('#minutos_pace').val(resultado[0])
    			$('#segundos_pace').val(resultado[1])
    		}else{
    			$('#minutos_pace').val('00')
    			$('#segundos_pace').val('00')
    		}
    	});

    });

</script>
@endsection
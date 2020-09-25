@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/datepicker/datepicker3.css') }}">
@endsection
@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">{{isset($id) ? "Editar Medalha" : "Nova Medalha"}}</h3>
		<div class="box-body">
			<form class="form-horizontal" method="POST" action="{{ route('salvaMedalha') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ old('id') }}">
				<div class="form-group">
					<label for="ativo" class="col-lg-2 control-label">Ativo</label>

					<div class="col-md-4">
						<select name="ativo" id="ativo" class="form-control{{ $errors->has('ativo') ? ' is-invalid' : '' }}" required>
							<option value="" {{ old('ativo') == '' ? 'selected' : '' }}></option>
							<option value="Sim" {{ old('ativo') == 'Sim' ? 'selected' : '' }}>Sim</option>
							<option value="Não" {{ old('ativo') == 'Não' ? 'selected' : '' }}>Não</option>						
						</select>

					</div>
				</div>
				<div class="form-group">
					<label for="nome" class="col-lg-2 control-label">Nome:</label>
					<div class="col-lg-4">
						<input type="nome" class="form-control" name="nome" id="nome" value="{{ old('nome') }}"> 
					</div>
				</div>
				<div class="form-group">
					<label for="tipo" class="col-lg-2 control-label">Tipo Atividade</label>

					<div class="col-md-4">
						<select class="form-control" name="tipo_atividade" id="tipo_atividade" >
							<option value=""></option>
							<option value="TODAS">TODAS</option>
							<option value="Ride">
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
					<label for="tipo" class="col-lg-2 control-label">Tipo</label>

					<div class="col-md-4">
						<select name="tipo" id="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" required>
							<option value="" {{ old('tipo') == '' ? 'selected' : '' }}></option>
							<option value="Km" {{ old('tipo') == 'Km' ? 'selected' : '' }}>Km</option>
							<option value="Dias" {{ old('tipo') == 'Dias' ? 'selected' : '' }}>Dias</option>						
						</select>

					</div>
				</div>

				<div class="form-group">
					<label for="descricao" class="col-lg-2 control-label">Quantidade:</label>
					<div class="col-lg-4">
						<input type="quantidade" class="form-control" name="quantidade" id="quantidade" value="{{ old('quantidade') }}"> 
					</div>
				</div>
				<div class="form-group">
					<label for="periodo_inicio" class="col-lg-2 control-label">Periodo Inicio:</label>
					<div class="col-lg-4">
						<input type="periodo_inicio" class="form-control" name="periodo_inicio" id="periodo_inicio" value="{{ (isset($medalha) ? $medalha->periodo_inicio  : '') }}" autocomplete="off"> 
					</div>
				</div>

				<div class="form-group">
					<label for="periodo_fim" class="col-lg-2 control-label">Periodo Fim:</label>
					<div class="col-lg-4">
						<input type="periodo_fim" class="form-control" name="periodo_fim" id="periodo_fim" value="{{ (isset($medalha) ? $medalha->periodo_fim  : '') }}" autocomplete="off"> 
					</div>
				</div>
				<div class="form-group">
					<label for="periodo_fim" class="col-lg-2 control-label">Texto:</label>
					<div class="col-lg-4">
						<textarea class="form-control" name="texto" id="texto" >{{ old('texto') }}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="periodo_fim" class="col-lg-2 control-label">Descrição Completa:</label>
					<div class="col-lg-12">
						<textarea class="form-control" name="descricao_completa" id="descricao_completa" >{!! old('descricao_completa') !!}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="imagem" class="col-lg-2 control-label">Imagem:</label>
					<div class="col-lg-4">
						<div class="input-group">
							<span class="input-group-btn">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
									<i class="fa fa-picture-o"></i> Arquivo
								</a>
							</span>
							<input id="thumbnail" class="form-control" type="text" name="imagem" value="{{old('imagem')}}">
						</div>
						<img id="holder" style="margin-top:15px;max-height:100px;">
					</div>
					@if(!empty(old('imagem')))
					<img src="{{old('imagem')}}" class="img-fluid img-thumbnail" style="max-width: 100px; max-height: 100px;">
					@endif
				</div>
				<div class="form-group">
					<label for="imagem" class="col-lg-2 control-label">Imagem de confirmacao:</label>
					<div class="col-lg-4">
						<div class="input-group">
							<span class="input-group-btn">
								<a id="lfm2" data-input="thumbnail2" data-preview="holder" class="btn btn-primary">
									<i class="fa fa-picture-o"></i> Arquivo
								</a>
							</span>
							<input id="thumbnail2" class="form-control" type="text" name="img_confirmacao" value="{{old('img_confirmacao')}}">
						</div>
						<img id="holder" style="margin-top:15px;max-height:100px;">
					</div>
					@if(!empty(old('img_confirmacao')))
					<img src="{{old('img_confirmacao')}}" class="img-fluid img-thumbnail" style="max-width: 100px; max-height: 100px;">
					@endif
				</div>
				<br/>


				<div class="form-group">
					<div class="col-lg-2 col-lg-offset-10">
						<button type="submit" class="btn btn-success btn-flat">Confirmar</button>
						<a href="{{ route('Medalha') }}" type="reset" class="btn btn-danger btn-flat">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="{{ asset('js/cidades-estados-1-4.js') }}"></script>
<script src="{{ asset('libs/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('libs/datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<script type="text/javascript">
	$('#lfm').filemanager('file');
	$('#lfm2').filemanager('file');
	$( document ).ready(function() {
		CKEDITOR.replace( 'descricao_completa', {
			height: 300,
			removePlugins: 'easyimage,cloudservices',
			toolbar : 'Basic',
		} );
		@if(!empty(old('tipo_atividade')))
		$('#tipo_atividade').val('{{old('tipo_atividade')}}')
		@endif
		$('#periodo_inicio').mask('00/00/0000');
		$('#periodo_inicio').datepicker({
			todayHighlight: true,
			language: "pt-BR",
			format: 'dd/mm/yyyy',
			minDate: '01/01/1900',
			autoclose: true
		});
		$('#periodo_fim').mask('00/00/0000');
		$('#periodo_fim').datepicker({
			todayHighlight: true,
			language: "pt-BR",
			format: 'dd/mm/yyyy',
			minDate: '01/01/1900',
			autoclose: true
		});

	});
</script>
@endsection
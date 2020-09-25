@extends('layouts.template')
@section('styles')
<link rel="stylesheet" href="{{ secure_asset('plugins/sweetalert2-master/dist/sweetalert2.min.css') }}">
@endsection
@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{{isset($pagina) ? "Editar Pagina" : "Nova Pagina"}}</h3>
			<div class="box-body">
				<form class="form-horizontal" method="POST" action="{{ route('novaPagina') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id_empresa" value="{{ $pagina->id }}">

					<fieldset>
						<div class="form-group">
							<label for="descricao" class="col-lg-2 control-label">Descrição:</label>
							<div class="col-lg-4">
								<input type="text" class="form-control input-sm" name="descricao" id="descricao" value="{{isset($pagina) ? $bandeira->descricao : ""}}">
							</div>
						</div>						
						<br/>
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-flat">Confirmar</button>
								<a href="{{ route('listaBandeiras') }}" type="reset" class="btn btn-danger btn-flat">Cancelar</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">{{isset($id) ? "Editar Categoria" : "Nova Categoria"}}</h3>
		<div class="box-body">
			<form class="form-horizontal" method="POST" action="{{ route('salvaCategoria') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ old('id') }}">

				<fieldset>
					<div class="form-group">
						<label for="descricao" class="col-lg-2 control-label">Nome:</label>
						<div class="col-lg-4">
							<input type="text" class="form-control input-sm" name="nome" id="nome" value="{{ old('nome') }}" required>
						</div>
					</div>	
					<div class="form-group">
						<label for="submenu" class="col-lg-2 control-label">Menu</label>

						<div class="col-md-4">
							<select name="menu" id="menu" class="form-control{{ $errors->has('menu') ? ' is-invalid' : '' }}" required>
								<option value="" {{ old('menu') == '' ? 'selected' : '' }}></option>
								<option value="1" {{ old('menu') == '1' ? 'selected' : '' }}>Sim</option>
								<option value="0" {{ old('menu') == '0' ? 'selected' : '' }}>Não</option>
							</select>

						</div>
					</div>	
					<div class="form-group">
						<label for="ordem" class="col-lg-2 control-label">Ordem</label>

						<div class="col-md-4">
							<input type="number" min="0" class="form-control input-sm" name="ordem" id="ordem" value="{{ old('ordem') }}">

						</div>
					</div>					
					<br/>

					<div class="form-group">
						<div class="col-lg-2 col-lg-offset-10">
							<button type="submit" class="btn btn-success btn-flat">Confirmar</button>
							<a href="{{ route('Categorias') }}" type="reset" class="btn btn-danger btn-flat">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection

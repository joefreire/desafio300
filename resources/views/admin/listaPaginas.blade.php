@extends('layouts.admin')
@section('styles')
<tr>
	@endsection
	@section('content')

	<div class="box">

		<div class="box-tools pull-right">			
			<a href="{{route('Pagina')}}" class="btn btn-flat btn-primary btn-lg"  style="
			margin: 6px;
			">
			<i class="fa fa-plus"></i> Novo
		</a>
	</div>
	<br>
	<div class="box-body">			
		<table class="table table-bordered" id="table" width="100%">
			<thead>
				<th>id</th>
				<th>Titulo</th>
				<th>Descricao</th>
				<th>Criador</th>
				<th>Categoria</th>
				<th>Data Criação</th>
				<th>Ultima Edição</th>
				<th>Editar</th>
			</tr>
		</thead>
	</table>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
	$(function() {
		$('#table').DataTable({
			"language": {
				"url": "{{ asset('plugins/datatables.net/js/Portuguese-Brasil.json')}}"
			},
						processing: true,
			serverSide: true,
			responsive: true,
			ajax: '{!! route('Paginas') !!}',
			columns: [
			{ data: 'id' },
			{ data: 'titulo'},
			{ data: 'descricao'},
			{ data: 'autor'},
			{ data: 'categoria'},
			{ data: 'created_at'},
			{ data: 'updated_at'},
			{ data: 'action'}
			]
		});
	});
</script>
@endsection
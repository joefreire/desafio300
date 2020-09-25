@extends('layouts.admin')
@section('styles')
<tr>
	@endsection
	@section('content')

	<div class="box">

		<div class="box-tools pull-right">			
			<a href="{{route('Medalha')}}" class="btn btn-flat btn-primary btn-lg"  style="
			margin: 6px;
			">
			<i class="fa fa-plus"></i> Novo
		</a>
	</div>
	<br>
	<div class="box-body">			
		<table class="table table-bordered" id="table" width="100%">
			<thead>
				<th>Ativo?</th>
				<th>Nome</th>
				<th>Tipo</th>				
				<th>Quantidade</th>
				<th>Atividade</th>
				<th>Criador</th>	
				<th>Imagem</th>							
				<th>Data Criação</th>
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
			ajax: '{!! route('Medalhas') !!}',
			columns: [
			{ data: 'ativo'},
			{ data: 'nome'},
			{ data: 'tipo'},		
			{ data: 'quantidade'},
			{ data: 'tipo_atividade'},
			{ data: 'usuario'},
			{
				data: "imagem", "aTargets": [0],
				"render": function (data, type, full) {
					return '<img src="'+data+'" class="img-fluid" style="max-width: 40px; max-height: 40px;">';
				}
			},
			{ data: 'created_at'},
			{ data: 'action'}
			]
		});
	});
</script>
@endsection
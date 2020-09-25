@extends('layouts.admin')
@section('styles')
				<tr>
@endsection
@section('content')

<div class="box">
	<div class="box-body">			
		<table class="table table-bordered" id="table" width="100%">
			<thead>
					<th>id</th>
					<th>Usuario</th>
					<th>Tipo</th>
					<th>Nome</th>
					<th>Distancia</th>
					<th>Tempo</th>					
					<th>Cidade</th>
					<th>Estado</th>
					<th>Velocidade Média</th>
					<th>Strava</th>
					<th>Data</th>
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
			ajax: '{!! route('Atividades') !!}',
			columns: [
			{ data: 'id' ,  defaultContent:''},
			{ data: 'usuario', name: 'user.nome',  defaultContent:''},
			{ data: 'tipo', orderable: false, search: false,  defaultContent:''},
			{ data: 'name',  defaultContent:''},
			{ data: 'distance',  defaultContent:''},
			{ data: 'tempo', orderable: false, search: false,  defaultContent:''},
			{ data: 'location_city',  defaultContent:''},
			{ data: 'location_state',  defaultContent:''},
			{ data: 'average_speed',  defaultContent:''},
			{ data: 'strava', orderable: false, search: false,  defaultContent:''},
			{ data: 'created_at',  defaultContent:''}
			]
		});
	});
</script>
@endsection
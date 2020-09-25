@extends('layouts.admin')
@section('styles')

@endsection
@section('content')

<div class="box">
	<div class="box-body">			
		<table class="table table-bordered" id="table" width="100%">
			<thead>
				<th>id</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Cidade</th>
				<th>Estado</th>
				<th>Dt Nascimento</th>
				<th>Altura</th>
				<th>Peso Atual</th>
				<th>Qtd Dias</th>
				<th>Data Cadastro</th>
				<th>Ações</th>
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
		  var table = $('#table').DataTable({
			"language": {
				"url": "{{ asset('plugins/datatables.net/js/Portuguese-Brasil.json')}}"
			},
			sDom: 'Bfrtip',
			lengthChange: false,
			buttons: [ 'excel', 'pdf'],
			processing: true,
			serverSide: false,
			responsive: true,
			ajax: '{!! route('Usuarios') !!}',
			columns: [
			{ data: 'id' },
			{ data: 'nome'},
			{ data: 'email'},
			{ data: 'cidade'},
			{ data: 'estado'},
			{ data: 'dt_nascimento'},
			{ data: 'altura'},
			{ data: 'pesoAtual'},
			{ data: 'dias'},
			{ data: 'created_at'},
			{ data: 'action'}
			]
		});
		table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)' );
	});
</script>
@endsection
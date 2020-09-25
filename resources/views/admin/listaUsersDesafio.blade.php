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
				<th>Nome</th>				
				<th>Email</th>
				<th>Cidade</th>
				<th>Estado</th>									
				<th>Entrada</th>
				<th>Conclusão?</th>
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
			ajax: '{!! route('verUsuariosDesafio',$id) !!}',
			columns: [
			{ data: 'user.nome'},
			{ data: 'user.email'},
			{ data: 'user.cidade'},
			{ data: 'user.estado'},
			{ data: 'created_at'},
			{ data: 'concluido'}
			]
		});
		table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)' );
	});
</script>
@endsection
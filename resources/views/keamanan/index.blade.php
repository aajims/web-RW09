@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="keamanan/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Personil Keamanan</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Jabatan</th>
						<th>Periode</th>
						<th>No Handphone</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>


	@endsection

	@section('scripts')
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		$(document).ready(function(){
			$('.table-bordered').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				bAutoWidth:false,
				ajax: "{{ url('keamanan/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'name', name: 'name'},
	            {data: 'jabatans.name', name: 'jabatan'},
	            {data: 'periode', name: 'periode'},
	            {data: 'nohp', name: 'nohp'},
	            {data: 'foto',
				"render": function (data) {
					return '<img src="public/' + data + '" width="30" height="30"/>';
				},
				 name: 'foto'},
	            {data: 'action', name: 'action'}
	            ]
	        });

		})
	</script>
	@endsection
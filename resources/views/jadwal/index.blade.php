@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="jadwal/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Jadwal</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Hari </th>
						<th>Jam Mulai </th>
						<th>Jam Selesai </th>
						<th>Petugas </th>
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
				ajax: "{{ url('jadwal/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'hari', name: 'hari'},
	            {data: 'jam_mulai', name: 'jam_mulai'},
	            {data: 'jam_selesai', name: 'jam'},
	            {data: 'petugas', 
				render: function(data, type, row) {
					var petugas = [];
					
					if (Array.isArray(data)) { // Memastikan bahwa data adalah array
						for (var i = 0; i < data.length; i++) {
							if (data[i].name) { // Memastikan bahwa elemen array memiliki properti 'name'
								petugas.push(data[i].name);
							}
						}
					}
					return petugas.join(", ");
				}
				},
	            {data: 'action', name: 'action'}
	            ]
	        });

		})
	</script>
	@endsection
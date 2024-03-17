@extends('layouts.master')

@section('content')
		<div class="tambah">
			<a href="penduduk/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Penduduk</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>RT </th>
						<th>Nama </th>
						<th>Jenis Kelamin </th>
						<th>Status </th>
						<th>Pendidikan </th>
						<th>Satatus Keluarga</th>
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
			console.log($('.table-bordered').DataTable)
			$('.table-bordered').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				bAutoWidth:false,
				ajax: "{{ url('penduduk/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'rts.nama', name: 'rt'},
	            {data: 'nama_lengkap', name: 'nama_lengkap'},
	            {data: 'jk', name: 'jk'},
	            {data: 'status_perkawinan', name: 'status_perkawinan'},
	            {data: 'pendidikan_terakhir', name: 'pendidikan_terakhir'},
	            {data: 'status_keluarga', name: 'status_keluarga'},
	            {data: 'action', name: 'action'}
	            ]
	        });

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "penduduk/delete/"+ id,
						dataType: "JSON",
						data: {
							"_token": "{{ csrf_token() }}",
							"id": id 
						},
						error: function(xhr) {
						console.log(xhr.responseText); 
					}
					});
				}
				$(document).ajaxStop(function(){
					window.location.reload();
				});
			});

		})
	</script>
	@endsection
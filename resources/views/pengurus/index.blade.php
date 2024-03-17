@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="pengurus/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Pengurus</a>
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
				ajax: "{{ url('pengurus/yajra') }}",
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

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "pengurus/delete/"+ id,
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
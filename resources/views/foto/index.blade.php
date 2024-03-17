@extends('layouts.master')

@section('content')

	<div class="tambah">
		<a href="foto/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Foto Kegiatan</a>
	</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Agenda </th>
						<th>Caption </th>
						<th>Foto Kegiatan </th>
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
				ajax: "{{ url('foto/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'agenda.nama_agenda', name: 'agenda_id'},
	            {data: 'caption', name: 'caption'},
	            {data: 'images', 
				"render": function (data) {
					return '<img src="public/' + data + '" width="30" height="30"/>';
				},
				name: 'images'},
	            {data: 'action', name: 'action'}
	            ]
	        });
			console.log($('.table-bordered').DataTable)

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "foto/delete/"+ id,
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
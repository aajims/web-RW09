@extends('layouts.master')

@section('content')
		<div class="tambah">
			<a href="slide/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Slide</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title </th>
						<th>Image </th>
						<th>Detail </th>
						<th>Status </th>
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
				ajax: "{{ url('slide/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'title', name: 'title'},
				{data: 'image',
				"render": function (data) {
					return '<img src="public/' + data + '" width="70" height="30"/>';
				}, name: 'image'},
	            {data: 'detail', name: 'detail'},
	            {data: 'status_text', name: 'status'},
	            {data: 'action', name: 'action'}
	            ]
	        });
			console.log($('.table-bordered').DataTable)

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "slide/delete/"+ id,
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
@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="headline/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Headline</a>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Content</th>
						<th>Status</th>
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
				autowidth: true,
				ajax: "{{ url('headline/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'title', name: 'title'},
	            {data: 'content', name: 'content'},
	            {data: 'status', name: 'status'},
	            {data: 'action', name: 'action'}
	            ]
	        });

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "headline/delete/"+ id,
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
@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="dokumen/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Dokumen</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title </th>
						<th>Konten </th>
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
				ajax: "{{ url('dokumen/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'title', name: 'title'},
	            {data: 'content', 
                "render": function(data, type, row) {
                  // Limit karakter data menjadi 50
                  if (type === 'display') {
                      return data.length > 100 ?
                             data.substr(0, 100) + '...' :
                             data;
                  }
                  return data;
              }},
	            {data: 'action', name: 'action'}
	            ]
	        });

		})
	</script>
	@endsection
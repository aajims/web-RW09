@extends('layouts.master')

@section('content')

		<div class="tambah">
			<a href="cabor/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Cabang Olahraga</a>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Logo </th>
						<th>Nama </th>
						<th>Slug </th>
						<th>Lokasi </th>
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
				ajax: "{{ url('cabor/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'logo', 
                "render": function (data) {
					return '<img src="/assets/img/cabor/' + data + '" width="30" height="30"/>';

				},
                },
	            {data: 'name', name: 'name'},
	            {data: 'slug', name: 'slug'},
	            {data: 'lokasi', name: 'lokasi'},
	            {data: 'action', name: 'action'}
	            ]
	        });

		})
	</script>
	@endsection
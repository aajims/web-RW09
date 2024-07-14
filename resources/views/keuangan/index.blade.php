	@extends('layouts.master')

	@section('content')
	<div class="tambah">
		<a href="keuangan/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Data Keuangan</a>
	</div>
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Tanggal</th>
					<th>Kategori</th>
					<th>Pemasukan</th>
					<th>Pengeluaran</th>
					<th>Keterangan</th>
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
				ajax: "{{ url('keuangan/yajra') }}",
				columns: [
	            // or just disable search since it's not really searchable. just add searchable:false
	            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            {data: 'tanggal', name: 'tanggal'},
	            {data: 'kategori_keuangan.nama_kategori', name: 'kategori_id'},
	            {data: 'pemasukan', name: 'pemasukan', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ')},
	            {data: 'pengeluaran', name: 'pengeluaran', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ')},
	            {data: 'keterangan', name: 'keterangan'},
	            {data: 'action', name: 'action'}
	            ]
	        });

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Are You sure want to delete this Data !")){
					$.ajax({
						type: "DELETE",
						url: "keuangan/delete/"+ id,
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

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
						<th>L/P </th>
						<th>Status </th>
						<th>Pendidikan </th>
						<th>Status Keluarga</th>
						<th>Aksi</th>
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
	            {data: 'status_perkawinan', 
				render: function(data){
                    if(data == '1'){
						let kawin = 'Kawin'
						return '<span class="status bg-green">' + kawin + '</span>';
                    } else if (data == '2') {
						let belum = 'Belum Kawin'
						return '<span class="status bg-yellow">' + belum + '</span>';
					} else if (data == '3') {
						let mati = 'Cerai Mati'
						return '<span class="status bg-red">' + mati + '</span>';
					} else if (data == '4') {
						let hidup = 'Cerai Hidup'
						return '<span class="status bg-red">' + hidup + '</span>';
					} else {
						return '';
					}
				},
				name: 'status_perkawinan'},
	            {data: 'pendidikan_terakhir', 
				render: function(data){
                    if(data == '1'){
						let smp = 'SMP/Sederajat'
						return '<span class="status bg-smp">' + smp + '</span>';
                    } else if (data == '2') {
						let smu = 'SMU/Sederajat'
						return '<span class="status bg-smu">' + smu + '</span>';
					} else if (data == '3') {
						let s1 = 'Strata 1'
						return '<span class="status bg-s1">' + s1 + '</span>';
					} else if (data == '4') {
						let s2 = 'Strata 2'
						return '<span class="status bg-s1">' + s2 + '</span>';
					} else if (data == '3') {
						let s3 = 'Strata 3'
						return '<span class="status bg-s1">' + s3 + '</span>';
					} else {
						return '';
					}
				},
				name: 'pendidikan_terakhir'},
	            {data: 'status_keluarga',
				render: function(data){
                    if(data == '1'){
						let kepala = 'Kepala Keluarga'
						return '<span class="status bg-green">' + kepala + '</span>';
                    } else if (data == '2') {
						let istri = 'Istri'
						return '<span class="status bg-yellow">' + istri + '</span>';
					} else if (data == '3') {
						let anak = 'Anak'
						return '<span class="status pengajuan">' + anak + '</span>';
					}  else {
						return '';
					}
				},
				 name: 'status_keluarga'},
	            {data: 'action', name: 'action'}
	            ]
	        });

			$('body').on('click','.deleteData',function(e){
				var id = $(this).data("id");
				if(confirm("Apakah Anda Yakin mau Delete Data Ini !")){
					$.ajax({
						type: "DELETE",
						url: "penduduk/"+ id,
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
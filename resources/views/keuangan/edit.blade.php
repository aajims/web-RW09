@extends('layouts.master')

@section('content')
	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('keuangan/'.$keu->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label>Kategori Keuangan</label>
						<select class="form-control" name="kategori_id">
							<option value="{{ $keu->kategori_id }}"> {{ $keu->kategori_keuangan->nama_kategori }}</option>
							@foreach ($category as $item)
							<option value="{{ $item->id }}"> {{ $item->nama_kategori }}</option>
							@endforeach
							</select>
							<span class="text-danger">{{ $errors->first('kategori_id') }}</span>
					</div>
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							  </span>
							</div>
						<input type="text" name="tanggal" class="form-control" value="{{ $keu->tanggal }}" id="tanggal">
						</div>
					</div>
					<div class="form-group">
						<label>Transaksi</label>
						<select class="form-control" onchange="pilihTransaksi()" name="transaksi" id="transaksi">
							<option value=""> -- Pilih Transaksi --</option>
							<option value="pemasukan"> Pemasukan</option>
							<option value="pengeluaran"> Pengeluaran</option>
							</select>
							<span class="text-danger">{{ $errors->first('transaksi') }}</span>
					</div>
					<div class="form-group" id="pemasukan" style="display: none">
						<label>Pemasukan</label>
						<input type="text" name="pemasukan" class="form-control" value="{{ $keu->pemasukan }}" placeholder="Input Pemasukan"> 
					</div>
					<div class="form-group" id="pengeluaran" style="display: none">
						<label>Pengeluaran</label>
						<input type="text" name="pengeluaran" class="form-control" value="{{ $keu->pengeluaran }}" placeholder="Input Pengeluaran">  
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" cols="50" name="ket" placeholder="Input Text Max 150 Character"
						rows="3" data-validation="required"
						>{{ $keu->keterangan }}</textarea>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update </button>
				</div>
			</form>
		</div>
	</div>
	@endsection

@section('scripts')
<script type="text/javascript">
	function pilihTransaksi() {
		var trans = document.getElementById("transaksi").value
		if (trans === "pengeluaran"){
			document.getElementById("pengeluaran").style.display="block";
			document.getElementById("pemasukan").style.display="none";
		} else if(trans === "pemasukan") {
			document.getElementById("pengeluaran").style.display="none";
			document.getElementById("pemasukan").style.display="block";
		} else {
			document.getElementById("pengeluaran").style.display="none";
			document.getElementById("pemasukan").style.display="none";
		}
	}
	$(function () {
		//Date picker
		$('#tanggal').datepicker({
			format: 'yyyy-mm-dd'
		});
		$( "#myform" ).validate({
		rules: {
			tanggal: { required: true },
			kategori_id: { required: true, minlength: 4}
			},
			messages: {
			tanggal: {
				required: "Tanggal mohon di isi dahulu"
			},
			uraian: {
				required: "Uraian mohon di isi dahulu",
				minlength: "Uraian Min 4 Character"
			},
			seksi: {
				required: "Seksi mohon di Pilih dahulu"
			},
			keterangan: {
				required: "Keterangan mohon di isi dahulu",
				minlength: "Uraian Min 4 Character"
			},
		}
		});
	})
</script>
@endsection
@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" id="myform" method="post" action="{{ url('keuangan/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							  </span>
							</div>
							<input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo date("Y-m-d");?>">
						</div>
					</div>
					<div class="form-group">
						<label>Kategori Keuangan</label>
						<select class="form-control" name="kategori_id">
							<option value=""> -- Pilih Kategori --</option>
							@foreach ($kategori as $item)
							<option value="{{ $item->id }}"> {{ $item->nama_kategori }}</option>
							@endforeach
							</select>
							<span class="text-danger">{{ $errors->first('kategori_id') }}</span>
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
						<input type="text" name="pemasukan" class="form-control" placeholder="Input Pemasukan"> 
					</div>
					<div class="form-group" id="pengeluaran" style="display: none">
						<label>Pengeluaran</label>
						<input type="text" name="pengeluaran" class="form-control" placeholder="Input Pengeluaran">  
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" cols="50" name="ket" placeholder="Input Text Max 150 Character"
						rows="3" data-validation="required"
						></textarea>
						<span class="text-danger">{{ $errors->first('ket') }}</span>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Save </button>
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
			uraian: { required: true, minlength: 4},
			transaksi: { required: true },
			seksi: { required: true },
			keterangan: { required: true, minlength: 4 }
			},
			messages: {
			tanggal: {
				required: "Tanggal mohon di isi dahulu"
			},
			uraian: {
				required: "Uraian mohon di isi dahulu",
				minlength: "Uraian Min 4 Character"
			},
			transaksi: {
				required: "Transaksi mohon di Pilih dahulu"
			},
			seksi: {
				required: "Seksi mohon di Pilih dahulu"
			},
			keterangan: {
				required: "Keterangan mohon di isi dahulu"
			},
		}
		});
	})
</script>
@endsection
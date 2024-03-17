@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('agenda/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Agenda Kategori</label>
						<select class="form-control" name="kategori">
							<option value=""> -- Pilih Agenda Kategori -- </option>
							<option value="Agenda Harian"> Agenda Harian</option>
							<option value="Agenda Mingguan"> Agenda Mingguan</option>
							<option value="Agenda Bulanan"> Agenda Bulanan</option>
							<option value="Agenda Tahunan"> Agenda Tahunan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nama Agenda</label>
						<input type="text" name="nama" class="form-control" id="" placeholder="Input Nama Agenda">
						<span class="text-danger">{{ $errors->first('nama') }}</span>
					</div>
					<div class="form-group">
						<label for="">Waktu Pelaksanaan</label>
						<input type="text" name="waktu" class="form-control" id="" placeholder="Input Waktu Pelakasanaan Agenda">
						<span class="text-danger">{{ $errors->first('waktu') }}</span>
					</div>
					<div class="form-group">
						<label for="">Lokasi Pelaksanaan</label>
						<input type="text" name="lokasi" class="form-control" id="" placeholder="Input Lokasi Pelaksaan">
						<span class="text-danger">{{ $errors->first('lokasi') }}</span>
					</div>
					<div class="form-group">
						<label for="">Penanggung Jawab</label>
						<input type="text" name="penanggungjawab" class="form-control" id="" placeholder="Input Waktu Pelakasanaan Agenda">
						<span class="text-danger">{{ $errors->first('penanggungjawab') }}</span>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea class="form-control" name="ket" rows="3"></textarea>
						<span class="text-danger">{{ $errors->first('ket') }}</span>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
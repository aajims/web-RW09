@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('jadwal/'.$keamanan->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Personil keamanan</label>
						<input type="text" name="name" class="form-control" value="{{ $keamanan->name }}" readonly>
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Senin</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Monday" {{ in_array('Monday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="senin_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="senin_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Selasa</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Tuesday" {{ in_array('Tuesday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="selasa_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="selasa_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Rabu</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Wednesday" {{ in_array('Wednesday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="rabu_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="rabu_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Kamis</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Thursday" {{ in_array('Thursday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="kamis_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="kamis_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Jum'at</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Friday" {{ in_array('Friday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="jumat_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="jumat_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Sabtu</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Saturday" {{ in_array('Saturday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="sabtu_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="sabtu_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Minggu</label>&nbsp;
								<input type="checkbox" name="hari[]" value="Sunday" {{ in_array('Sunday', explode(',', $keamanan->hari)) ? 'checked' : '' }}>
								<input type="time" name="minggu_jam_mulai" value="{{ $keamanan->jam_mulai }}">
								<input type="time" name="minggu_jam_selesai" value="{{ $keamanan->jam_selesai }}">
							</div>
						</div>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update Jadwal</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
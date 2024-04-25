@extends('layouts.master')

@section('content')

	<div class="col-md-12">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('jadwal/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nama Hari</label>
							<select name="hari" class="form-control" id="">
								<option value="Monday"> Senin </option>
								<option value="Tuesday"> Selasa </option>
								<option value="Wednesday"> Rabu </option>
								<option value="Thursday"> Kamis </option>
								<option value="Friday"> Jum'at </option>
								<option value="Saturday"> Sabtu </option>
								<option value="Sunday"> Minggu </option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Jam Mulai</label><br/>
								<input type="time" name="jam_mulai" >
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Jam Selesai</label><br/>
								<input type="time" name="jam_selesai" >
							</div>
						</div>
						<div class="col"></div>
					</div>
					<div class="row">
						@foreach ($keamanan as $item)
						<div class="col">
							<input type="checkbox" value="{{ $item->id }}" name="keamanan_id[]">&nbsp;
							<label for="">{{ $item->name }}</label>
						</div>
						@endforeach
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

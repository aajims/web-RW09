@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('pengurus/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Pengurus</label>
						<input type="text" name="name" class="form-control" id="" placeholder="Input Nama Pengurus">
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="form-group">
						<label for="">Jabatan</label>
						<select class="form-control" name="jabatan_id">
							<option value=""> -- Pilih Jabatan --</option>
							@foreach ($jab as $item)
							<option value="{{ $item->id }}"> {{ $item->name }}</option>
							@endforeach
							</select>
							<span class="text-danger">{{ $errors->first('jabatan_id') }}</span>
						<span class="text-danger">{{ $errors->first('jabatan') }}</span>
					</div>
					<div class="form-group">
						<label for="">Periode</label>
						<input type="text" name="periode" class="form-control" id="" placeholder="Input Periode">
						<span class="text-danger">{{ $errors->first('periode') }}</span>
					</div>
					<div class="form-group">
						<label for="">Foto</label>
						<input type="file" name="foto" class="form-control" id="" placeholder="Input foto">
						<span>Max Size 2 Mb</span>
						<span class="text-danger">{{ $errors->first('foto') }}</span>
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
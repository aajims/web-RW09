@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('pengurus/'.$pengurus->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Pengurus</label>
						<input type="text" name="name" class="form-control" value="{{ $pengurus->name }}" placeholder="Input Nama Pengurus">
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="form-group">
						<label for="">Jabatan</label>
						<select class="form-control" name="jabatan_id">
							<option value="{{ $pengurus->jabatan_id }}"> {{ $pengurus->jabatans->name }}</option>
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
						<input type="text" name="periode" class="form-control" value="{{ $pengurus->periode }}" placeholder="Input Periode">
						<span class="text-danger">{{ $errors->first('periode') }}</span>
					</div>
					<div class="form-group">
						<label for="">Foto</label>
						<div class="pengurus">
							<?php if ($pengurus->foto === null) { ?>
								<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
							<?php } else { ?>
								<img class="img-pengurus" src="{{ asset($pengurus->foto) }}" />
							<?php } ?>
						</div>
						<input type="file" name="foto" class="form-control" placeholder="Input foto">
						<span class="text-danger">{{ $errors->first('foto') }}</span>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
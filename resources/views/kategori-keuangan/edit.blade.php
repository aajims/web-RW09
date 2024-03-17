@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('kategori-keuangan/'.$ag->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Kategori</label>
						<input type="text" name="nama" class="form-control" value="{{ $ag->nama_kategori }}" placeholder="Input Nama kategori-keuangan">
						<span class="text-danger">{{ $errors->first('nama') }}</span>
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
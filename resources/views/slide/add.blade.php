@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('slide/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Title</label>
						<input type="text" name="title" class="form-control"  placeholder="Input Nama Title">
						<span class="text-danger">{{ $errors->first('title') }}</span>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Detail Konten</label>
								<input type="text" name="detail" class="form-control"  placeholder="Input Detail Konten">
								<span class="text-danger">{{ $errors->first('detail') }}</span>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Image Slide</label>
								<input type="file" name="image" class="form-control"  placeholder="Input ">
								<span>Upload Foto Max 2 Mb</span>
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
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
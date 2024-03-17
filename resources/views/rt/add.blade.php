@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('rt/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama RT</label>
						<input type="text" name="nama" class="form-control"  placeholder="Input Nama RT">
						<span class="text-danger">{{ $errors->first('nama') }}</span>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Ketua RT</label>
								<input type="text" name="ketua" class="form-control"  placeholder="Input Nama Ketua RT">
								<span class="text-danger">{{ $errors->first('ketua') }}</span>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Foto Ketua RT</label>
								<input type="file" name="foto" class="form-control"  placeholder="Input Nama Ketua RT">
								<span>Upload Foto Max 2 Mb</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Sekertaris</label>
						<input type="text" name="sekertaris" class="form-control"  placeholder="Input Nama sekertaris RT">
						<span class="text-danger">{{ $errors->first('sekertaris') }}</span>
					</div>
					<div class="form-group">
						<label for="">Bendahara</label>
						<input type="text" name="bendahara" class="form-control"  placeholder="Input Nama bendahara RT">
						<span class="text-danger">{{ $errors->first('bendahara') }}</span>
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
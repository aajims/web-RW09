@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('dokumen/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Title /Judul</label>
						<input type="text" name="title" placeholder="Input Title" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Upload PDF</label>
						<input type="file" name="document" placeholder="Input Dokumen" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Konten Isi</label>
                        <textarea name="content" class="form-control" id="content" placeholder="Input Konten" cols="30" rows="10"></textarea>
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
<script src="{{ asset('adminLTE3/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
		$('#content').summernote()
	});
</script>

@endsection
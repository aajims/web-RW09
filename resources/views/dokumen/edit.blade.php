@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('dokumen/'.$dokumen->id ) }}">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Title /Judul</label>
						<input type="text" name="title" placeholder="Input Title" value="{{ $dokumen->title }}" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Konten Isi</label>
                        <textarea name="content" class="form-control" id="content" placeholder="Input Konten" cols="30" rows="10">{{ $dokumen->content }}</textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
    console.error( error );
    });
</script>

@endsection
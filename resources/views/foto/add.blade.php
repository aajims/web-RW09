@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('foto/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Agenda Kegiatan</label>
						<select class="form-control" name="agenda_id" id="">
							<option value=""> -- Pilih Agenda -- </option>
							@foreach ($ag as $item)
							<option value="{{ $item->id }}"> {{ $item->nama_agenda }}</option>
							@endforeach
						</select>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Caption Foto</label>
								<input type="text" name="caption" class="form-control"  placeholder="Input Caption">
								<span class="text-danger">{{ $errors->first('caption') }}</span>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Foto Kegiatan</label>
								<input type="file" name="images" class="form-control" accept="image/png, image/jpeg, image/gif" onchange="loadFile(event)" />
								<span>Upload Foto Max 2 Mb</span>
								<p><img id="output" width="250" /></p>
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
<script type="text/javascript">
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	}
</script>
@endsection
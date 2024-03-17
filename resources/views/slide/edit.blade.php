@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('slide/'.$slide->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Title</label>
						<input type="text" name="title" class="form-control" value="{{ $slide->title }}" placeholder="Input Nama Title">
						<span class="text-danger">{{ $errors->first('title') }}</span>
					</div>
					<div class="form-group">
						<label for="">Detail Konten</label>
						<input type="text" name="detail" class="form-control" value="{{ $slide->detail }}" placeholder="Input Detail Konten">
						<span class="text-danger">{{ $errors->first('detail') }}</span>
					</div>
					<div class="row">
						<div class="col" style="text-align: right" >
							<div class="pengurus">
								<?php if ($slide->image === null) { ?>
									<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
								<?php } else { ?>
									<img class="img-slide" src="{{ asset($slide->image) }}" />
								<?php } ?>
								<input type="hidden" name="oldImage" value="{{ $slide->image }}"/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Ganti Image Slide</label>
								<input type="file" name="image" class="form-control" placeholder="Input ">
								<span>Upload Foto Max 2 Mb</span>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Status Slide</label>
								<div><?php if ($slide->status == '1') { ?>
									<input type="radio" name="status" value="1" checked /> Aktif <br/>
									<input type="radio" name="status" value="2" /> Tidak Aktif
								<?php } else { ?>
									<input type="radio" name="status" value="1" /> Aktif <br/>
									<input type="radio" name="status" value="2" checked /> Tidak Aktif
								<?php } ?>
								</div>
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
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
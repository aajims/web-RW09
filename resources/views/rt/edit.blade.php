@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('rt/'.$rt->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama RT</label>
						<input type="text" name="nama" class="form-control" value="{{ $rt->nama }}" placeholder="Input Nama RT">
						<span class="text-danger">{{ $errors->first('nama') }}</span>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Ketua RT</label>
								<input type="text" name="ketua" class="form-control" value="{{ $rt->ketua }}" placeholder="Input Nama Ketua RT">
								<span class="text-danger">{{ $errors->first('ketua') }}</span>
							</div>
						</div>
						<div class="col" style="text-align: right" >
							<div class="pengurus">
								<?php if ($rt->foto === null) { ?>
									<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
								<?php } else { ?>
									<img class="img-pengurus" src="{{ asset($rt->foto) }}" />
								<?php } ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Foto Ketua RT</label>
								<input type="file" name="foto" class="form-control" onchange="loadFile(event)">
								<span>Upload Foto Max 2 Mb</span>
							</div>
						</div>
						<div class="col">
							<p><img id="output" width="100" /></p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Sekertaris</label>
								<input type="text" name="sekertaris" class="form-control" value="{{ $rt->sekertaris }}" placeholder="Input Nama sekertaris RT">
								<span class="text-danger">{{ $errors->first('sekertaris') }}</span>
							</div>
						</div>
						<div class="col" style="text-align: right" >
							<div class="pengurus">
								<?php if ($rt->foto1 === null) { ?>
									<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
								<?php } else { ?>
									<img class="img-pengurus" src="{{ asset($rt->foto1) }}" />
								<?php } ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Foto Sekertaris RT</label>
								<input type="file" name="foto1" class="form-control" onchange="loadFile1(event)">
								<span>Upload Foto Max 2 Mb</span>
							</div>
						</div>
						<div class="col">
							<p><img id="output1" width="100" /></p>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Bendahara</label>
								<input type="text" name="bendahara" class="form-control" value="{{ $rt->bendahara }}" placeholder="Input Nama bendahara RT">
								<span class="text-danger">{{ $errors->first('bendahara') }}</span>
							</div>
						</div>
						<div class="col" style="text-align: right" >
							<div class="pengurus">
								<?php if ($rt->foto2 === null) { ?>
									<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
								<?php } else { ?>
									<img class="img-pengurus" src="{{ asset($rt->foto2) }}" />
								<?php } ?>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Foto Bendahara RT</label>
								<input type="file" name="foto2" class="form-control" onchange="loadFile2(event)">
								<span>Upload Foto Max 2 Mb</span>
							</div>
						</div>
						<div class="col">
							<p><img id="output2" width="100" /></p>
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
<script type="text/javascript">
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	}
	var loadFile1 = function(event) {
		var image1 = document.getElementById('output1');
		image1.src = URL.createObjectURL(event.target.files[0]);
	}
	var loadFile2 = function(event) {
		var image2 = document.getElementById('output2');
		image2.src = URL.createObjectURL(event.target.files[0]);
	}
</script>
@endsection
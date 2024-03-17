@extends('layouts.master')

@section('content')


	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('foto/'.$foto->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Agenda Kegiatan</label>
						<select class="form-control" name="agenda_id" id="">
							<option value="{{ $foto->agenda_id }}"> {{ $foto->agenda->nama_agenda }}</option>
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
								<input type="text" name="caption" class="form-control" value="{{ $foto->caption }}" placeholder="Input Caption">
								<span class="text-danger">{{ $errors->first('caption') }}</span>
							</div>
						</div>
						<div class="col" style="text-align: right" >
							<div class="pengurus">
								<?php if ($foto->images === null) { ?>
									<img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
								<?php } else { ?>
									<img class="img-slide" src="{{ asset($foto->images) }}" />
								<?php } ?>
								<input type="hidden" name="oldImage" value="{{ $foto->images }}"/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="">Ganti Foto Kegiatan</label>
								<input type="file" name="images" class="form-control" placeholder="Input ">
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
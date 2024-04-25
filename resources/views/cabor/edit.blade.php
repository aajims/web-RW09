@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('cabor/'.$cabor->id) }}">
				{{ csrf_field() }}
                {{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Cabang Olahraga</label>
						<input type="text" name="name" class="form-control" value="{{ $cabor->name }}" placeholder="Input Nama Cabor">
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
                    <div class="form-group">
						<label for="">Lokasi </label>
						<input type="text" name="lokasi" class="form-control" value="{{ $cabor->lokasi }}" placeholder="Input Lokasi Cabang olahraga">
						<span class="text-danger">{{ $errors->first('lokasi') }}</span>
					</div>
                    <div class="pengurus">
                        <?php if ($cabor->logo === null) { ?>
                            <img class="img-pengurus" src="{{ asset('assets/img/human_icon.png') }}" />
                        <?php } else { ?>
                            <img class="img-pengurus" src="{{ asset('assets/img/cabor/'.$cabor->logo) }}" />
                        <?php } ?>
                        <input type="hidden" name="oldLogo" value="{{ $cabor->logo }}"/>
                    </div>
                    <div class="form-group">
                        <label for="">Logo Cabang Olahraga</label>
                        <input type="file" name="logo" class="form-control" placeholder="Input">
                        <span>Upload Logo Max 1 Mb</span>
                    </div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update Data</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
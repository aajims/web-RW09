@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('headline/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Title</label>
						<input type="text" name="nama" class="form-control" id="" placeholder="Input Title">
						<span class="text-danger">{{ $errors->first('nama') }}</span>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Content</label>
						<textarea class="form-control" name="content" rows="3"></textarea>
						<span class="text-danger">{{ $errors->first('content') }}</span>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Status</label>
						<select class="form-control" name="status">
							<option value=""> -- Pilih Status -- </option>
							<option value="visible"> visible</option>
							<option value="unvisible"> unvisible</option>
						</select>
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
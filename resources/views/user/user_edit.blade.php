@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('user/'.$user->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group">
						<label>Email</label>
					<input type="text" name="email" class="form-control" value="{{ $user->email }}" id="" placeholder="Input Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" id="" placeholder="Input Password">
					</div>
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" value="{{ $user->name }}" id="" placeholder="Input Nama">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Role</label>
						<select class="form-control" name="role">
						<option value="{{ $user->role }}"> {{ $user->role }}</option>
							<option value=""> -- Pilih Role -- </option>
							<option value="Super Admin"> Super Admin</option>
							<option value="Admin"> Admin</option>
							<option value="Staff"> Staff</option>
							<option value="Staff23"> Staff RT 23</option>
							<option value="Staff24"> Staff RT 24</option>
							<option value="Staff25"> Staff RT 25</option>
							<option value="Staff26"> Staff RT 26</option>
							<option value="Staff27"> Staff RT 27</option>
							<option value="Staff28"> Staff RT 28</option>
							<option value="Staff29"> Staff RT 29</option>
							<option value="Staff41"> Staff RT 41</option>
							<option value="Staff48"> Staff RT 48</option>
							<option value="Bendahara"> Bendahara</option>
						</select>
					</div>
				</div>
				<?php
					$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
				?>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?=$url; ?>" class="btn btn-danger"> Back</a>
					<button type="submit" class="btn btn-primary">Update Data </button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
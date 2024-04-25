@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" enctype="multipart/form-data" action="{{ url('pertandingan/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="">Cabang Olahraga</label>
						<select name="cabor_id" class="form-control" id="">
							<option value=""> -- Pilih --</option>
							@foreach ($cabor as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
						<span class="text-danger">{{ $errors->first('cabor_id') }}</span>
					</div>
                    <div class="form-group">
						<label for="">Waktu </label>
						<div class="input-group date" id="id_1">
                            <input type="text" value="{{ date('Y-m-d H:i:s') }}" name="waktu" class="form-control" required/>
                            <div class="input-group-addon input-group-append">
                                <div class="input-group-text">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
						<span class="text-danger">{{ $errors->first('waktu') }}</span>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="">Team A </label>
								<select name="team_a" class="form-control" id="">
									<option value="Team RT 23"> Team RT 23</option>
									<option value="Team RT 24"> Team RT 24</option>
									<option value="Team RT 25"> Team RT 25</option>
									<option value="Team RT 26"> Team RT 26</option>
									<option value="Team RT 27"> Team RT 27</option>
									<option value="Team RT 28"> Team RT 28</option>
									<option value="Team RT 29"> Team RT 29</option>
									<option value="Team RT 41"> Team RT 41</option>
									<option value="Team RT 48"> Team RT 48</option>
								</select>
								<span class="text-danger">{{ $errors->first('team_a') }}</span>
							</div>
						</div>
						<b class="vs"> VS </b>
						<div class="col">
							<div class="form-group">
								<label for="">Team B </label>
								<select name="team_b" class="form-control" id="">
									<option value="Team RT 23"> Team RT 23</option>
									<option value="Team RT 24"> Team RT 24</option>
									<option value="Team RT 25"> Team RT 25</option>
									<option value="Team RT 26"> Team RT 26</option>
									<option value="Team RT 27"> Team RT 27</option>
									<option value="Team RT 28"> Team RT 28</option>
									<option value="Team RT 29"> Team RT 29</option>
									<option value="Team RT 41"> Team RT 41</option>
									<option value="Team RT 48"> Team RT 48</option>
								</select>
								<span class="text-danger">{{ $errors->first('team_b') }}</span>
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
					<button type="submit" class="btn btn-primary">Save Data</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
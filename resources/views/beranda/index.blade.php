@extends('layouts.master')

@section('content')

		<div class="card-body">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
						<h3>{{ $penduduk }}</h3>

							<p>Total Data Penduduk</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-stalker"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
						<h3>{{ $keuangan }}</h3>

							<p>Data Keuangan</p>
						</div>
						<div class="icon">
							<i class="ion ion-cash"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
						<h3>{{ $agenda }}</h3>

							<p>Data Agenda Kegiatan</p>
						</div>
						<div class="icon">
							<i class="ion ion-calendar"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
						<h3>11</h3>

							<p>Data Foto Kegiatan</p>
						</div>
						<div class="icon">
							<i class="ion ion-images"></i>
						</div>
						<a href="{{ url('foto') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	

@endsection
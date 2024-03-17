@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('penduduk/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label>Pilih RT</label>
						<select class="form-control" name="rt">
							<option value=""> -- Pilih RT --</option>
							@foreach ($rt as $item)
							<option value="{{ $item->id }}"> {{ $item->nama }}</option>
							@endforeach
							</select>
							<span class="text-danger">{{ $errors->first('kategori_id') }}</span>
					</div>
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" class="form-control"  placeholder="Input Nama Lengkap">
						<span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea class="form-control" name="alamat" placeholder="Input Alamat Lengkap"
						rows="3" data-validation="required"
						></textarea>
						<span class="text-danger">{{ $errors->first('alamat') }}</span>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk">
							<option value=""> -- Pilih  --</option>
							<option value="Laki-laki"> Laki-laki </option>
							<option value="Perempuan"> Perempuan </option>
							</select>
							<span class="text-danger">{{ $errors->first('jk') }}</span>
					</div>
					<div class="form-group">
						<label>Status Perkawinan</label>
						<select class="form-control" name="status_perkawinan">
							<option value=""> -- Pilih Status --</option>
							<option value="Kawin"> Kawin </option>
							<option value="Belum Kawin"> Belum Kawin </option>
							<option value="Cerai Mati"> Cerai Mati </option>
							<option value="Cerai Hidup"> Cerai Hidup </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_perkawinan') }}</span>
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
						<input type="text" name="tempat" class="form-control"  placeholder="Input Nama Tempat Lahir">
						<span class="text-danger">{{ $errors->first('tempat') }}</span>
					</div>
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">
								<i class="far fa-calendar-alt"></i>
							  </span>
							</div>
							<input type="text" name="tgl_lahir" class="form-control" id="tanggal" value="<?php echo date("Y-m-d");?>">
						</div>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<select class="form-control" name="agama">
							<option value=""> -- Pilih Agama --</option>
							<option value="Islam"> Islam </option>
							<option value="Kristen"> Kristen </option>
							<option value="Katolik"> Katolik </option>
							<option value="Hindu"> Hindu </option>
							<option value="Budha"> Budha </option>
							<option value="Konghucu"> Konghucu </option>
							</select>
							<span class="text-danger">{{ $errors->first('agama') }}</span>
					</div>
					<div class="form-group">
						<label>Pendidikan Terakhir</label>
						<select class="form-control" name="pendidikan_terakhir">
							<option value=""> -- Pilih Pendidikan --</option>
							<option value="SD"> SD </option>
							<option value="SMP"> SMP </option>
							<option value="SMU"> SMU </option>
							<option value="S1"> Strata 1 </option>
							<option value="S2"> Strata 2 </option>
							<option value="S3"> Strata 3 </option>
							</select>
							<span class="text-danger">{{ $errors->first('pendidikan_terakhir') }}</span>
					</div>
					<div class="form-group">
						<label>Pekerjaan</label>
						<select class="form-control" name="pekerjaan">
							<option value=""> -- Pilih Pekerjaan --</option>
							<option value="Karyawan Swasta"> Karyawan Swasta </option>
							<option value="Pelajar/ Mahasiswa"> Pelajar/ Mahasiswa </option>
							<option value="Pewagai Negeri Sipil"> Pewagai Negeri Sipil </option>
							<option value="Pedagang"> Pedagang </option>
							<option value="Wiraswasta"> Wiraswasta </option>
							<option value="Ibu Rumah Tangga"> Ibu Rumah Tangga </option>
							<option value="Petani/ Pekebun"> Petani/ Pekebun </option>
							<option value="Nelayan"> Nelayan </option>
							<option value="Lainya"> Lainya </option>
							</select>
							<span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
					</div>
					<div class="form-group">
						<label>Status di Keluarga</label>
						<select class="form-control" name="status_keluarga">
							<option value=""> -- Pilih Status --</option>
							<option value="Kepala Keluarga"> Kepala Keluarga </option>
							<option value="Istri"> Istri </option>
							<option value="Anak"> Anak </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_keluarga') }}</span>
					</div>
					<div class="form-group">
						<label>Status Rumah Tinggal</label>
						<select class="form-control" name="status_rumah_tinggal">
							<option value=""> -- Pilih Status --</option>
							<option value="Rumah Sendiri"> Rumah Sendiri </option>
							<option value="Kontrak/Sewa"> Kontrak/Sewa</option>
							<option value="Dinas"> Dinas </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_rumah_tinggal') }}</span>
					</div>
					<div class="form-group">
						<label>Status Ekonomi</label>
						<select class="form-control" name="status_ekonomi">
							<option value="Ekonomi Atas"> Ekonomi Atas </option>
							<option value="Ekonomi Sedang"> Ekonomi Sedang</option>
							<option value="Ekonomi Bawah"> Ekonomi Bawah </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_ekonomi') }}</span>
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
	$(function () {
		//Date picker
		$('#tanggal').datepicker({
			format: 'yyyy-mm-dd'
		});
	})
</script>
	@endsection
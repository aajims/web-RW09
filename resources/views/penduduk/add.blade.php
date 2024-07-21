@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
			<form role="form" method="post" action="{{ url('penduduk/store') }}">
				{{ csrf_field() }}
				<div class="box-body">
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
							<option value="L"> Laki-laki </option>
							<option value="P"> Perempuan </option>
							</select>
							<span class="text-danger">{{ $errors->first('jk') }}</span>
					</div>
					<div class="form-group">
						<label>Status Perkawinan</label>
						<select class="form-control" name="status_perkawinan">
							<option value=""> -- Pilih Status --</option>
							<option value="1"> Kawin </option>
							<option value="2"> Belum Kawin </option>
							<option value="3"> Cerai Mati </option>
							<option value="4"> Cerai Hidup </option>
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
							<option value="1"> Islam </option>
							<option value="2"> Kristen </option>
							<option value="3"> Katolik </option>
							<option value="4"> Hindu </option>
							<option value="5"> Budha </option>
							<option value="6"> Konghucu </option>
							</select>
							<span class="text-danger">{{ $errors->first('agama') }}</span>
					</div>
					<div class="form-group">
						<label>Pendidikan Terakhir</label>
						<select class="form-control" name="pendidikan_terakhir">
							<option value=""> -- Pilih Pendidikan --</option>
							<option value="1"> SMP/Sederajat </option>
							<option value="2"> SMU/Sederajat </option>
							<option value="3"> Strata 1 </option>
							<option value="4"> Strata 2 </option>
							<option value="5"> Strata 3 </option>
							</select>
							<span class="text-danger">{{ $errors->first('pendidikan_terakhir') }}</span>
					</div>
					<div class="form-group">
						<label>Pekerjaan</label>
						<select class="form-control" name="pekerjaan">
							<option value=""> -- Pilih Pekerjaan --</option>
							<option value="1"> Karyawan Swasta </option>
							<option value="2"> Pelajar/ Mahasiswa </option>
							<option value="3"> Pewagai Negeri Sipil </option>
							<option value="4"> Pedagang </option>
							<option value="5"> Wiraswasta </option>
							<option value="6"> Ibu Rumah Tangga </option>
							<option value="7"> Petani/ Pekebun </option>
							<option value="8"> Nelayan </option>
							<option value="9"> Lainya </option>
							</select>
							<span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
					</div>
					<div class="form-group">
						<label>Status di Keluarga</label>
						<select class="form-control" name="status_keluarga">
							<option value=""> -- Pilih Status --</option>
							<option value="1"> Kepala Keluarga </option>
							<option value="2"> Istri </option>
							<option value="3"> Anak </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_keluarga') }}</span>
					</div>
					<div class="form-group">
						<label>Status Rumah Tinggal</label>
						<select class="form-control" name="status_rumah_tinggal">
							<option value=""> -- Pilih Status --</option>
							<option value="1"> Rumah Sendiri </option>
							<option value="2"> Kontrak/Sewa</option>
							<option value="3"> Dinas </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_rumah_tinggal') }}</span>
					</div>
					<div class="form-group">
						<label>Status Ekonomi</label>
						<select class="form-control" name="status_ekonomi">
							<option value="1"> Ekonomi Atas </option>
							<option value="2"> Ekonomi Sedang</option>
							<option value="3"> Ekonomi Bawah </option>
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
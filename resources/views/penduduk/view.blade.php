@extends('layouts.master')

@section('content')

	<div class="col-md-10">
		<div class="card-body">
				<div class="box-body">
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" class="form-control" value="{{ $penduduk->nama_lengkap }}" placeholder="Input Nama Lengkap" disabled>
						<span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea class="form-control" name="alamat" placeholder="Input Alamat Lengkap"
						rows="3" data-validation="required"
						>{{ $penduduk->alamat }}</textarea>
						<span class="text-danger">{{ $errors->first('alamat') }}</span>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk">
							<option value="{{ $penduduk->jk }}"> {{ $penduduk->jk }}</option>
							<option value=""> -- Pilih  --</option>
							<option value="L"> Laki-laki </option>
							<option value="P"> Perempuan </option>
							</select>
							<span class="text-danger">{{ $errors->first('jk') }}</span>
					</div>
					<div class="form-group">
						<label>Status Perkawinan</label>
						<select class="form-control" name="status_perkawinan" disabled>
							@if ($penduduk->status_perkawinan == '1')
								<option value="{{ $penduduk->status_perkawinan }}"> Kawin</option>
							@elseif ($penduduk->status_perkawinan == '2')
								<option value="{{ $penduduk->status_perkawinan }}"> Belum Kawin</option>
							@elseif ($penduduk->status_perkawinan == '3')
								<option value="{{ $penduduk->status_perkawinan }}"> Cerai Mati</option>
							@elseif ($penduduk->status_perkawinan == '4')
								<option value="{{ $penduduk->status_perkawinan }}"> Cerai Hidup</option>
							@endif
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
						<input type="text" name="tempat" class="form-control" value="{{ $penduduk->tempat }}" placeholder="Input Nama Tempat Lahir">
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
							<input type="text" name="tgl_lahir" class="form-control" id="tanggal" value="{{ $penduduk->tgl_lahir }}">
						</div>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<select class="form-control" name="agama" disabled>
							@if ($penduduk->agama == '1')
								<option value="{{ $penduduk->agama }}"> Islam</option>
							@elseif ($penduduk->agama == '2')
								<option value="{{ $penduduk->agama }}"> Kristen</option>
							@elseif ($penduduk->agama == '3')
								<option value="{{ $penduduk->agama }}"> Katolik</option>
							@elseif ($penduduk->agama == '4')
								<option value="{{ $penduduk->agama }}"> Hindu</option>
							@elseif ($penduduk->agama == '5')
								<option value="{{ $penduduk->agama }}"> Budha</option>
							@elseif ($penduduk->agama == '6')
								<option value="{{ $penduduk->agama }}"> Konghucu</option>
							@endif
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
						<select class="form-control" name="pendidikan_terakhir" disabled>
							@if ($penduduk->pendidikan_terakhir == '1')
								<option value="{{ $penduduk->pendidikan_terakhir }}"> SMP/Sederajat</option>
							@elseif ($penduduk->pendidikan_terakhir == '2')
								<option value="{{ $penduduk->pendidikan_terakhir }}"> SMU/Sederajat</option>
							@elseif ($penduduk->pendidikan_terakhir == '3')
								<option value="{{ $penduduk->pendidikan_terakhir }}"> Strata 1</option>
							@elseif ($penduduk->pendidikan_terakhir == '4')
								<option value="{{ $penduduk->pendidikan_terakhir }}"> Strata 2</option>
							@elseif ($penduduk->pendidikan_terakhir == '5')
								<option value="{{ $penduduk->pendidikan_terakhir }}"> Strata 3</option>
							@endif
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
						<select class="form-control" name="pekerjaan" disabled>
							@if ($penduduk->pekerjaan == '1')
								<option value="{{ $penduduk->pekerjaan }}"> Karyawan Swasta</option>
							@elseif ($penduduk->pekerjaan == '2')
								<option value="{{ $penduduk->pekerjaan }}"> Pelajar/ Mahasiswa </option>
							@elseif ($penduduk->pekerjaan == '3')
								<option value="{{ $penduduk->pekerjaan }}"> Pewagai Negeri Sipil</option>
							@elseif ($penduduk->pekerjaan == '4')
								<option value="{{ $penduduk->pekerjaan }}"> Pedagang</option>
							@elseif ($penduduk->pekerjaan == '5')
								<option value="{{ $penduduk->pekerjaan }}"> Wiraswasta</option>
							@elseif ($penduduk->pekerjaan == '6')
								<option value="{{ $penduduk->pekerjaan }}"> Ibu Rumah Tangga</option>
							@elseif ($penduduk->pekerjaan == '7')
								<option value="{{ $penduduk->pekerjaan }}"> Petani/ Pekebun</option>
							@elseif ($penduduk->pekerjaan == '8')
								<option value="{{ $penduduk->pekerjaan }}"> Nelayan</option>
							@elseif ($penduduk->pekerjaan == '9')
								<option value="{{ $penduduk->pekerjaan }}"> Lainnya</option>	
							@endif
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
						<select class="form-control" name="status_keluarga" disabled>
							@if ($penduduk->status_keluarga == '1')
								<option value="{{ $penduduk->status_keluarga }}"> Kepala Keluarga</option>
							@elseif ($penduduk->status_keluarga == '2')
								<option value="{{ $penduduk->status_keluarga }}"> Istri</option>
							@elseif ($penduduk->status_keluarga == '3')
								<option value="{{ $penduduk->status_keluarga }}"> Anak</option>
							@endif
							<option value=""> -- Pilih Status --</option>
							<option value="1"> Kepala Keluarga </option>
							<option value="2"> Istri </option>
							<option value="3"> Anak </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_keluarga') }}</span>
					</div>
					<div class="form-group">
						<label>Status Rumah Tinggal</label>
						<select class="form-control" name="status_rumah_tinggal" disabled>
							@if ($penduduk->status_rumah_tinggal == '1')
								<option value="{{ $penduduk->status_rumah_tinggal }}"> Rumah Sendiri</option>
							@elseif ($penduduk->status_rumah_tinggal == '2')
								<option value="{{ $penduduk->status_rumah_tinggal }}"> Kontrak/Sewa</option>
							@elseif ($penduduk->status_rumah_tinggal == '3')
								<option value="{{ $penduduk->status_rumah_tinggal }}"> Rumah Dinas</option>
							@endif
							<option value=""> -- Pilih Status --</option>
							<option value="1"> Rumah Sendiri </option>
							<option value="2"> Kontrak/Sewa</option>
							<option value="3"> Dinas </option>
							</select>
							<span class="text-danger">{{ $errors->first('status_rumah_tinggal') }}</span>
					</div>
					<div class="form-group">
						<label>Status Ekonomi</label>
						<select class="form-control" name="status_ekonomi" disabled>
							@if ($penduduk->status_ekonomi == '1')
								<option value="{{ $penduduk->status_ekonomi }}"> Ekonomi Atas</option>
							@elseif ($penduduk->status_ekonomi == '2')
								<option value="{{ $penduduk->status_ekonomi }}"> Ekonomi Sedang</option>
							@elseif ($penduduk->status_ekonomi == '3')
								<option value="{{ $penduduk->status_ekonomi }}"> Ekonomi Bawah</option>
							@endif
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
				</div>
			</form>
		</div>
	</div>

@endsection

@section('scripts')
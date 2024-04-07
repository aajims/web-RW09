<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $agenda_kategori
 * @property string $nama_agenda
 * @property string $waktu
 * @property string $lokasi
 * @property string $penanggungjawab
 * @property string $ket
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Foto> $foto
 * @property-read int|null $foto_count
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereAgendaKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereLokasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereNamaAgenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan wherePenanggungjawab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgendaKegiatan whereWaktu($value)
 */
	class AgendaKegiatan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $agenda_id
 * @property string $caption
 * @property string $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AgendaKegiatan|null $agenda
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereAgendaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereUpdatedAt($value)
 */
	class Foto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $detail
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Headline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Headline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Headline query()
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Headline whereUpdatedAt($value)
 */
	class Headline extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pengurus> $pengurus
 * @property-read int|null $pengurus_count
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereUpdatedAt($value)
 */
	class Jabatan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_kategori
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Keuangan> $keuangans
 * @property-read int|null $keuangans_count
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan query()
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan whereNamaKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KategoriKeuangan whereUpdatedAt($value)
 */
	class KategoriKeuangan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Jabatan|null $jabatans
 * @method static \Illuminate\Database\Eloquent\Builder|Keamanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keamanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keamanan query()
 */
	class Keamanan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $tanggal
 * @property int $kategori_id
 * @property int|null $pemasukan
 * @property int|null $pengeluaran
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KategoriKeuangan|null $kategori_keuangan
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan wherePemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan wherePengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keuangan whereUpdatedAt($value)
 */
	class Keuangan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_lengkap
 * @property string $alamat
 * @property int $rt_id
 * @property string $jk
 * @property string $status_perkawinan
 * @property string $tempat
 * @property string $tgl_lahir
 * @property string $agama
 * @property string $pendidikan_terakhir
 * @property string $pekerjaan
 * @property string $status_keluarga
 * @property string $status_rumah_tinggal
 * @property string $status_ekonomi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Rt|null $rts
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk wherePendidikanTerakhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereRtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereStatusEkonomi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereStatusKeluarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereStatusPerkawinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereStatusRumahTinggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereTempat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penduduk whereUpdatedAt($value)
 */
	class Penduduk extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $jabatan_id
 * @property string|null $periode
 * @property string|null $nohp
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Jabatan|null $jabatans
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereJabatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus wherePeriode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengurus whereUpdatedAt($value)
 */
	class Pengurus extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $kategori_program
 * @property string $nama_program
 * @property string $waktu
 * @property string $penanggungjawab
 * @property string $ket
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereKategoriProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereNamaProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja wherePenanggungjawab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramKerja whereWaktu($value)
 */
	class ProgramKerja extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property string $ketua
 * @property string|null $foto
 * @property string $sekertaris
 * @property string $bendahara
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Penduduk> $penduduks
 * @property-read int|null $penduduks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Rt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereBendahara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereKetua($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereSekertaris($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rt whereUpdatedAt($value)
 */
	class Rt extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $detail
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 */
	class Slide extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}


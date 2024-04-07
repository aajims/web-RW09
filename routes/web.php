<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return redirect('beranda');
    });
    
    Route::get('beranda', 'App\Http\Controllers\BerandaController@index');
    //user
    Route::get('user', 'App\Http\Controllers\UserController@index')->middleware('checkRole:Super Admin');
    Route::get('user/yajra', 'App\Http\Controllers\UserController@yajra')->middleware('checkRole:Super Admin');
    Route::get('user/add', 'App\Http\Controllers\UserController@add')->middleware('checkRole:Super Admin');
    Route::get('profil', 'App\Http\Controllers\UserController@profile');
    Route::post('/change-password', 'App\Http\Controllers\UserController@changePassword')->name('change.password')->middleware('checkRole:Super Admin');
    Route::post('user/store', 'App\Http\Controllers\UserController@store')->middleware('checkRole:Super Admin');
    Route::get('user/{id}', 'App\Http\Controllers\UserController@edit')->middleware('checkRole:Super Admin');
    Route::put('user/{id}', 'App\Http\Controllers\UserController@update')->middleware('checkRole:Super Admin');
    Route::delete('user/{id}', 'App\Http\Controllers\UserController@delete')->middleware('checkRole:Super Admin');

     //Jabatan
     Route::get('jabatan', 'App\Http\Controllers\JabatanController@index')->middleware(['checkRole:Super Admin,Admin']);
     Route::get('jabatan/yajra', 'App\Http\Controllers\JabatanController@yajra');
     Route::get('jabatan/add', 'App\Http\Controllers\JabatanController@add')->middleware(['checkRole:Super Admin,Admin']);
     Route::post('jabatan/store', 'App\Http\Controllers\JabatanController@store')->middleware(['checkRole:Super Admin,Admin']);
     Route::get('jabatan/{id}', 'App\Http\Controllers\JabatanController@edit')->middleware(['checkRole:Super Admin,Admin']);
     Route::put('jabatan/{id}', 'App\Http\Controllers\JabatanController@update')->middleware(['checkRole:Super Admin,Admin']);
     Route::delete('jabatan/{id}', 'App\Http\Controllers\JabatanController@delete')->middleware(['checkRole:Super Admin,Admin']);

    //Pengurus
    Route::get('pengurus', 'App\Http\Controllers\PengurusController@index')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('pengurus/yajra', 'App\Http\Controllers\PengurusController@yajra');
    Route::get('pengurus/add', 'App\Http\Controllers\PengurusController@add')->middleware(['checkRole:Super Admin,Admin']);
    Route::post('pengurus/store', 'App\Http\Controllers\PengurusController@store')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('pengurus/{id}', 'App\Http\Controllers\PengurusController@edit')->middleware(['checkRole:Super Admin,Admin']);
    Route::put('pengurus/{id}', 'App\Http\Controllers\PengurusController@update')->middleware(['checkRole:Super Admin,Admin']);
    Route::delete('pengurus/{id}', 'App\Http\Controllers\PengurusController@delete')->middleware(['checkRole:Super Admin,Admin']);

     //Personil Keamanan
     Route::get('keamanan', 'App\Http\Controllers\KeamananController@index')->middleware(['checkRole:Super Admin,Admin']);
     Route::get('keamanan/yajra', 'App\Http\Controllers\KeamananController@yajra');
     Route::get('keamanan/add', 'App\Http\Controllers\KeamananController@add')->middleware(['checkRole:Super Admin,Admin']);
     Route::post('keamanan/store', 'App\Http\Controllers\KeamananController@store')->middleware(['checkRole:Super Admin,Admin']);
     Route::get('keamanan/{id}', 'App\Http\Controllers\KeamananController@edit')->middleware(['checkRole:Super Admin,Admin']);
     Route::put('keamanan/{id}', 'App\Http\Controllers\KeamananController@update')->middleware(['checkRole:Super Admin,Admin']);

    //Agenda Kegiatan
    Route::get('agenda', 'App\Http\Controllers\AgendaKegiatanController@index')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('agenda/yajra', 'App\Http\Controllers\AgendaKegiatanController@yajra');
    Route::get('agenda/add', 'App\Http\Controllers\AgendaKegiatanController@add')->middleware(['checkRole:Super Admin,Admin']);
    Route::post('agenda/store', 'App\Http\Controllers\AgendaKegiatanController@store')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('agenda/{id}', 'App\Http\Controllers\AgendaKegiatanController@edit')->middleware(['checkRole:Super Admin,Admin']);
    Route::put('agenda/{id}', 'App\Http\Controllers\AgendaKegiatanController@update')->middleware(['checkRole:Super Admin,Admin']);
    Route::delete('agenda/{id}', 'App\Http\Controllers\AgendaKegiatanController@delete')->middleware(['checkRole:Super Admin,Admin']);

    //Foto Kegiatan
    Route::get('foto', 'App\Http\Controllers\FotoController@index')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('foto/yajra', 'App\Http\Controllers\FotoController@yajra')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('foto/add', 'App\Http\Controllers\FotoController@add')->middleware(['checkRole:Super Admin,Admin']);
    Route::post('foto/store', 'App\Http\Controllers\FotoController@store')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('foto/{id}', 'App\Http\Controllers\FotoController@edit')->middleware(['checkRole:Super Admin,Admin']);
    Route::put('foto/{id}', 'App\Http\Controllers\FotoController@update')->middleware(['checkRole:Super Admin,Admin']);
    Route::delete('foto/{id}', 'App\Http\Controllers\FotoController@delete')->middleware(['checkRole:Super Admin,Admin']);

    //kategori keuangan
    Route::get('kategori-keuangan', 'App\Http\Controllers\KategoriKeuanganController@index')->middleware('checkRole:Bendahara');
    Route::get('kategori-keuangan/yajra', 'App\Http\Controllers\KategoriKeuanganController@yajra');
    Route::get('kategori-keuangan/add', 'App\Http\Controllers\KategoriKeuanganController@add')->middleware('checkRole:Bendahara');
    Route::post('kategori-keuangan/store', 'App\Http\Controllers\KategoriKeuanganController@store')->middleware('checkRole:Bendahara');
    Route::get('kategori-keuangan/{id}', 'App\Http\Controllers\KategoriKeuanganController@edit')->middleware('checkRole:Bendahara');
    Route::put('kategori-keuangan/{id}', 'App\Http\Controllers\KategoriKeuanganController@update')->middleware('checkRole:Bendahara');
    Route::delete('kategori-keuangan/{id}', 'App\Http\Controllers\KategoriKeuanganController@delete')->middleware('checkRole:Bendahara');

    //Keuangan
    Route::get('keuangan', 'App\Http\Controllers\KeuanganController@index')->middleware('checkRole:Bendahara');
    Route::get('keuangan/yajra', 'App\Http\Controllers\KeuanganController@yajra')->middleware('checkRole:Bendahara');
    Route::get('keuangan/add', 'App\Http\Controllers\KeuanganController@add')->middleware('checkRole:Bendahara');
    Route::post('keuangan/store', 'App\Http\Controllers\KeuanganController@store')->middleware('checkRole:Bendahara');
    Route::get('keuangan/{id}', 'App\Http\Controllers\KeuanganController@edit')->middleware('checkRole:Bendahara');
    Route::put('keuangan/{id}', 'App\Http\Controllers\KeuanganController@update')->middleware('checkRole:Bendahara');
    Route::delete('keuangan/{id}', 'App\Http\Controllers\KeuanganController@delete')->middleware('checkRole:Bendahara');

    //Data RT
    Route::get('rt', 'App\Http\Controllers\RtController@index')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('rt/yajra', 'App\Http\Controllers\RtController@yajra')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('rt/add', 'App\Http\Controllers\RtController@add')->middleware(['checkRole:Super Admin,Admin']);
    Route::post('rt/store', 'App\Http\Controllers\RtController@store')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('rt/{id}', 'App\Http\Controllers\RtController@edit')->middleware(['checkRole:Super Admin,Admin']);
    Route::put('rt/{id}', 'App\Http\Controllers\RtController@update')->middleware(['checkRole:Super Admin,Admin']);
    Route::delete('rt/{id}', 'App\Http\Controllers\RtController@delete')->middleware(['checkRole:Super Admin,Admin']);

    //Data Slide
    Route::get('slide', 'App\Http\Controllers\SlideController@index')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('slide/yajra', 'App\Http\Controllers\SlideController@yajra')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('slide/add', 'App\Http\Controllers\SlideController@add')->middleware(['checkRole:Super Admin,Admin']);
    Route::post('slide/store', 'App\Http\Controllers\SlideController@store')->middleware(['checkRole:Super Admin,Admin']);
    Route::get('slide/{id}', 'App\Http\Controllers\SlideController@edit')->middleware(['checkRole:Super Admin,Admin']);
    Route::put('slide/{id}', 'App\Http\Controllers\SlideController@update')->middleware(['checkRole:Super Admin,Admin']);
    Route::delete('slide/{id}', 'App\Http\Controllers\SlideController@delete')->middleware(['checkRole:Super Admin,Admin']);

      //Penduduk
      Route::get('penduduk', 'App\Http\Controllers\PendudukController@index')->middleware(['checkRole:Super Admin,Admin,Staff']);
      Route::get('penduduk/yajra', 'App\Http\Controllers\PendudukController@yajra');
      Route::get('penduduk/add', 'App\Http\Controllers\PendudukController@add')->middleware(['checkRole:Super Admin,Admin,Staff']);
      Route::post('penduduk/store', 'App\Http\Controllers\PendudukController@store')->middleware(['checkRole:Super Admin,Admin,Staff']);
      Route::get('penduduk/{id}', 'App\Http\Controllers\PendudukController@edit')->middleware(['checkRole:Super Admin,Admin,Staff']);
      Route::put('penduduk/{id}', 'App\Http\Controllers\PendudukController@update')->middleware(['checkRole:Super Admin,Admin,Staff']);
      Route::delete('penduduk/{id}', 'App\Http\Controllers\PendudukController@delete')->middleware(['checkRole:Super Admin,Admin,Staff']);

});

Auth::routes();


Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

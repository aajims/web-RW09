<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('beranda', 'App\Http\Controllers\BerandaController@list')->name('beranda.list');
Route::get('agenda', 'App\Http\Controllers\AgendaKegiatanController@list')->name('agenda.list');
Route::get('agenda/{id}', 'App\Http\Controllers\AgendaKegiatanController@view')->name('agenda.view');
Route::get('headline', 'App\Http\Controllers\HeadlineController@list')->name('headline.list');
Route::get('pengurus', 'App\Http\Controllers\PengurusController@list')->name('pengurus.list');
Route::get('rt', 'App\Http\Controllers\RtController@list')->name('rt.list');
Route::get('rt/{id}', 'App\Http\Controllers\RtController@view')->name('rt.view');
Route::get('slide', 'App\Http\Controllers\SlideController@list')->name('slide.list');
Route::get('keuangan', 'App\Http\Controllers\KeuanganController@list')->name('keuangan.list');
Route::get('foto', 'App\Http\Controllers\FotoController@list')->name('foto.list');
Route::get('foto/{id}', 'App\Http\Controllers\FotoController@view')->name('foto.view');
Route::get('penduduk', 'App\Http\Controllers\PendudukController@list')->name('pendudduk.list');
Route::get('security', 'App\Http\Controllers\KeamananController@list')->name('security.list');
Route::get('penduduk/{id}', 'App\Http\Controllers\PendudukController@view')->name('pendudduk.view');
Route::get('security/{id}', 'App\Http\Controllers\KeamananController@view')->name('security.view');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

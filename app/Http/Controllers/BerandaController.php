<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Keuangan;
use App\Models\AgendaKegiatan;
use App\Models\Foto;
use App\Models\Rt;
use App\Models\Slide;
use App\Models\Pengurus;

class BerandaController extends Controller
{
    public function index() {
        $title = 'Beranda';
        $subtitle = 'Home';
        $penduduk = Penduduk::all()->count();
        $keuangan = Keuangan::all()->count();
        $agenda = AgendaKegiatan::all()->count();
        $foto = Foto::all()->count();
        $rt = Rt::all()->count();
        $pengurus = Pengurus::all()->count();
        $slide = Slide::all()->count();
        return view('beranda.index',compact('title', 'subtitle', 'penduduk', 'keuangan', 'agenda', 'foto', 'rt', 'pengurus', 'slide'));
    }

    public function list() {
        $penduduk = Penduduk::all()->count();
        $keuangan = Keuangan::all()->count();
        $agenda = AgendaKegiatan::all()->count();
        $response=[
            'status'=>'success',
            'data' => [ $penduduk, $keuangan, $agenda ]
        ];
        return response()->json($response, 200);
    }
}

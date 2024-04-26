<?php

namespace App\Http\Controllers;

use App\Models\JadwalPersonil;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Keamanan;
use App\Models\Jadwal;
use Alert;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index() {
        $title = 'Jadwal Keamanan';
        $subtitle = 'Keamanan RW';
        $jadwals = Jadwal::with('petugas')->get();
        $keamanan = collect();
        foreach ($jadwals as $jadwal) {
            $keamanan_ids = explode(',', $jadwal->keamanan_id);
            $keamanan = $keamanan->merge(Keamanan::whereIn('id', $keamanan_ids)->get());
        }
        return view('jadwal.index', compact('title', 'subtitle', 'jadwals', 'keamanan'));
    }

    public function lisJadwalPetugas() {
        $jadwal = Jadwal::where('hari', 'Monday')
            ->with('petugas')
            ->where('jam_mulai', '>=', '06:00')
            ->where('jam_selesai', '<', '18:00')
            ->first();
    
        if ($jadwal) {
            $keamanan_ids = explode(',', $jadwal->keamanan_id);
            $keamanan = Keamanan::whereIn('id', $keamanan_ids)->get();
            $personilsData = $keamanan->map(function ($personil) {
                return [
                    'id' => $personil->id,
                    'name' => $personil->name,
                    'foto' => $personil->foto,
                ];
            });
    
            $response = [
                'status' => 'success',
                'message' => 'Jadwal Petugas',
                'data' => [
                    'Hari' => $jadwal->hari,
                    'Jam Mulai' => $jadwal->jam_mulai,
                    'Jam Selesai' => $jadwal->jam_selesai,
                    'Personils' => $personilsData
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan',
            ];
        }
        return response()->json($response, 200);
    }

    public function yajra(){
        $jadwals = Jadwal::with('petugas')->select([
            'id', 'hari', 'jam_mulai', 'jam_selesai', 'keamanan_id'])->get();
        $keamanan = collect();
        foreach ($jadwals as $jadwal) {
            $keamanan_ids = explode(',', $jadwal->keamanan_id);
            $keamanan = $keamanan->merge(Keamanan::whereIn('id', $keamanan_ids)->get());
        } 
        $datatables = Datatables::of($jadwals)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="jadwal/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
           </center>';
        });
        return $datatables->make(true);
    }

    public function add() {
        $title = 'Jadwal Keamanan';
        $subtitle = 'Keamanan RW';
        $keamanan = Keamanan::where('jabatan_id', '23')->get();
        return view('jadwal.add', compact('title', 'subtitle', 'keamanan'));
    }

    public function store(Request $request) {
        $this->validate($request, [
    		'hari'=>'required',
    		'jam_mulai'=>'required',
    		'jam_selesai'=>'required'
         ]);
        $keamanan = implode(',', $request->keamanan_id);
        $jadwal = new Jadwal();
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->keamanan_id = $keamanan;
        $jadwal->save();
        $personil = implode(',', $request->keamanan_id);
        $jadwalPersonil = new JadwalPersonil();
        $jadwalPersonil->jadwal_id = $jadwal->id;
        $jadwalPersonil->keamanan_id = $personil;
        $jadwalPersonil->save();
        Alert::success('Success', 'Data Berhasil di Simpan');
        return redirect('jadwal');
    }

    public function edit($id) {
        $title = 'Jadwal Keamanan';
        $subtitle = 'Keamanan RW';
        $jadwal = Jadwal::where('id', $id)->with('petugas')->first();
        $keamanan = Keamanan::where('jabatan_id', '23')->get();
        return view('jadwal.edit', compact('title', 'subtitle', 'jadwal', 'keamanan'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
    		'hari'=>'required',
    		'jam_mulai'=>'required',
    		'jam_selesai'=>'required'
         ]);
         $keamanan = implode(',', $request->keamanan_id);
         $jadwal = Jadwal::find($id);
         $jadwal->hari = $request->hari;
         $jadwal->jam_mulai = $request->jam_mulai;
         $jadwal->jam_selesai = $request->jam_selesai;
         $jadwal->keamanan_id = $keamanan;
         $jadwal->save();
         $personil = implode(',', $request->keamanan_id);
         $jadwalPersonil = JadwalPersonil::find($id);
         $jadwalPersonil->keamanan_id = $personil;
         $jadwalPersonil->save();
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('jadwal');
    }

    public function jadwalPetugas() 
    {
        $now = Carbon::now();
        $hariIni = $now->format('l'); 
        $jamSekarang = $now->format('H:i');
        $jamSekarangObj = Carbon::createFromFormat('H:i', $jamSekarang);
        $queryJadwal = Jadwal::where('hari', $hariIni)
                            ->with('petugas');

        if ($jamSekarangObj->hour >= 06 && $jamSekarangObj->hour < 18) {
            $queryJadwal->where('jam_mulai', '06:00')
                        ->where('jam_selesai', '18:00');
        } else {
            $queryJadwal->where(function($query) {
                $query->where('jam_mulai', '18:00')
                    ->orWhere('jam_selesai', '06:00');
            });
        }
        // Eksekusi query dan inisialisasi data
        $jadwal = $queryJadwal->first();
        $data = [];

        if ($jadwal) {
            $jadwalData = [
                'hari' => $jadwal->hari,
                'jam_mulai' => $jadwal->jam_mulai,
                'jam_selesai' => $jadwal->jam_selesai,
            ];

            $personils = explode(',', $jadwal->keamanan_id);
            $personilsData = [];

            foreach ($personils as $personilId) {
                $personil = Keamanan::find($personilId);
                if ($personil) {
                    $personilData = [
                        'id' => $personil->id,
                        'name' => $personil->name,
                        'foto' => $personil->foto,
                        'no_hp' => $personil->nohp,
                    ];
                    $personilsData[] = $personilData;
                }
            }
            $jadwalData['personils'] = $personilsData;
            $data[] = $jadwalData;
        }
        $response = [
            'status' => 'success',
            'message' => 'Jadwal Petugas untuk ' . $hariIni. ' Jam ' .$jamSekarang,
            'data' => $data
        ];

        return response()->json($response, 200);
       
    }    
}

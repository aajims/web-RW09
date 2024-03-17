<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use DataTables;
use App\Models\Keuangan;
use App\Models\KategoriKeuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $title = 'Keuangan';
        $subtitle = 'Data Keuangan';
        $data = Keuangan::with('kategori_keuangan')->latest()->get();
        return view('keuangan.index', compact('title', 'subtitle', 'data'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $foto = Keuangan::with('kategori_keuangan'->latest())->paginate(15);
        $response=[
            'status'=>'success',
            'message'=>'Keuangan list',
            'data' => $foto,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $kategori = Keuangan::with('kategori_keuangan')->latest()
        ->select([
            'id', 'tanggal', 'kategori_id', 'pemasukan', 'pengeluaran']);
        $datatables = Datatables::of($kategori)
        ->addIndexColumn()
        ->addColumn('action',function($rows){
            return '<center><a href="keuangan/'.$rows->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
            <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$rows->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteData"><i class="fa fa-trash"></i> Delete</a></center>';
        });

        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Data Keuangan';
        $subtitle = 'Keuangan';
        $kategori = KategoriKeuangan::All();
        return view('keuangan.add', compact('title', 'subtitle', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'tanggal'=>'required',
    		'kategori_id'=>'required'
         ]);
         $keuangan = new Keuangan;
         $keuangan->tanggal = $request->input('tanggal');
         $keuangan->kategori_id = $request->input('kategori_id');
         $keuangan->pemasukan = $request->input('pemasukan');
         $keuangan->pengeluaran = $request->input('pengeluaran');
         $keuangan->keterangan = $request->input('ket');
         $keuangan->save();
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('keuangan');
    }

    public function edit($id)
     {
        $title = 'Keuangan';
        $subtitle = 'Edit Keuangan';
        $category = KategoriKeuangan::All();
        $keu = Keuangan::where('id',$id)
        ->with('kategori_keuangan')
        ->first();
        return view('keuangan.edit', compact('title', 'subtitle', 'keu', 'category'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'tanggal'=>'required',
    		'kategori_id'=>'required'
         ]);
         $keuangan = Keuangan::find($id);
         $keuangan->tanggal = $request->input('tanggal');
         $keuangan->kategori_id = $request->input('kategori_id');
         $keuangan->pemasukan = $request->input('pemasukan');
         $keuangan->pengeluaran = $request->input('pengeluaran');
         $keuangan->keterangan = $request->input('ket');
         $keuangan->save();
        Alert::toast('Data Berhasil di Update', 'success');
         return redirect('keuangan');
    }

    public function delete($id)
    {
        Keuangan::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('keuangan');
    }
}

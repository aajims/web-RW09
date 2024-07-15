<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\KategoriKeuangan;
use Alert;
use Illuminate\Http\Request;

class KategoriKeuanganController extends Controller
{
    public function index()
    {
        $title = 'Kategori';
        $subtitle = 'Keuangan';
        $data = KategoriKeuangan::all();
        return view('kategori-keuangan.index', compact('title', 'subtitle', 'data'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function yajra(Request $request){
        $kategori = KategoriKeuangan::select([
            'id', 'nama_kategori'])->orderBy('id', 'DESC')->get();
        $datatables = Datatables::of($kategori)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="kategori-keuangan/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });

        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'kategori';
        $subtitle = 'Add kategori';
        return view('kategori-keuangan.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'nama'=>'required',
         ]);
         KategoriKeuangan::insert([
            'nama_kategori'=>$request->nama
         ]);
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('kategori-keuangan');
    }

    public function edit($id)
     {
        $title = 'kategori';
        $subtitle = 'Edit kategori Keuangan';
        $ag = KategoriKeuangan::where('id',$id)->first();

        return view('kategori-keuangan.edit', compact('title', 'subtitle', 'ag'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'nama'=>'required'
         ]);
         KategoriKeuangan::where('id',$id)->update([
            'nama_kategori'=>$request->nama
        ]);
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('kategori-keuangan');
    }

    public function delete($id)
    {
        kategoriKeuangan::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('kategori-keuangan');
    }
}

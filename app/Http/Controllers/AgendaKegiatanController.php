<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\AgendaKegiatan;
use Alert;
use Illuminate\Http\Request;

class AgendaKegiatanController extends Controller
{
    public function index()
    {
        $title = 'Agenda';
        $subtitle = 'Kegiatan';
        $agenda = AgendaKegiatan::all();
        return view('agenda.index', compact('title', 'subtitle', 'agenda'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function yajra(Request $request){
        $agenda = AgendaKegiatan::select([
            'id', 'agenda_kategori', 'nama_agenda', 'waktu', 'lokasi']);
        $datatables = Datatables::of($agenda)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="agenda/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });

        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'agenda';
        $subtitle = 'Add agenda';
        return view('agenda.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'kategori'=>'required',
    		'nama'=>'required',
    		'waktu'=>'required',
    		'lokasi'=>'required',
    		'penanggungjawab'=>'required',
         ]);
         AgendaKegiatan::insert([
            'agenda_kategori'=>$request->kategori,
            'nama_agenda'=>$request->nama,
            'waktu'=>$request->waktu,
            'lokasi'=>$request->lokasi,
            'penanggungjawab'=>$request->penanggungjawab,
            'ket'=>$request->ket,
         ]);
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('agenda');
    }

    public function edit($id)
     {
        $title = 'Agenda';
        $subtitle = 'Edit Agenda';
        $ag = AgendaKegiatan::where('id',$id)->first();

        return view('agenda.edit', compact('title', 'subtitle', 'ag'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'kategori'=>'required',
    		'nama'=>'required',
    		'waktu'=>'required',
    		'lokasi'=>'required',
    		'penanggungjawab'=>'required',
         ]);
         AgendaKegiatan::where('id',$id)->update([
            'agenda_kategori'=>$request->kategori,
            'nama_agenda'=>$request->nama,
            'waktu'=>$request->waktu,
            'lokasi'=>$request->lokasi,
            'penanggungjawab'=>$request->penanggungjawab,
            'ket'=>$request->ket
        ]);
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('agenda');
    }

    public function delete($id)
    {
        AgendaKegiatan::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('agenda');
    }
}

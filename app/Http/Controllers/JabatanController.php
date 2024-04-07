<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Jabatan;
use Alert;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $title = 'jabatan';
        $subtitle = 'RW';
        return view('jabatan.index', compact('title', 'subtitle'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function yajra(Request $request){
        $jabatan = Jabatan::select([
            'id', 'name'])->latest();
        $datatables = Datatables::of($jabatan)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="jabatan/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>&nbsp; Edit Data</a>';
        });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'jabatan';
        $subtitle = 'Add jabatan';
        return view('jabatan.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
         ]);
         $jabatan = new Jabatan;
         $jabatan->name = $request->input('name');
         $jabatan->save();
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('jabatan');
    }

    public function edit($id)
     {
        $title = 'jabatan';
        $subtitle = 'Edit jabatan';
        $jabatan = Jabatan::where('id',$id)->first();

        return view('jabatan.edit', compact('title', 'subtitle', 'jabatan'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'name'=>'required',
         ]);
         $jabatan = Jabatan::find($id);
         $jabatan->name = $request->input('name');
         $jabatan->save();
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('jabatan');
    }

    public function delete($id)
    {
        Jabatan::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('jabatan');
    }
}

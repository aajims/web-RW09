<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Pengurus;
use App\Models\Jabatan;
use Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class PengurusController extends Controller
{
    public function index()
    {
        $title = 'Pengurus';
        $subtitle = 'RW';
        $pengurus = Pengurus::with('jabatans')->latest()->get();
        return view('pengurus.index', compact('title', 'subtitle', 'pengurus'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $pengurus = Pengurus::with('jabatans')->get();
        $response=[
            'status'=>'success',
            'message'=>'Pengurus list',
            'data' => $pengurus,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $pengurus = Pengurus::with('jabatans')->select([
            'id', 'name', 'jabatan_id', 'periode', 'foto']);
        $datatables = Datatables::of($pengurus)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="pengurus/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Pengurus';
        $subtitle = 'Add Pengurus';
        $jab = Jabatan::latest()->get();
        return view('pengurus.add', compact('title', 'subtitle', 'jab'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
    		'jabatan_id'=>'required',
    		'periode'=>'required',
            'foto' => 'file|image|max:2048', // Maksimal 2 MB
         ]);

         $picName = $request->file('foto')->getClientOriginalExtension();
         $picName = Carbon::now()->timestamp. '.' . $picName;
         $destinationPath = 'assets/img/pengurus/' . $picName;
         $img = Image::make($request->file('foto'));
         $img->resize(165, 165);
         $img->save($destinationPath);

         $pengurus = new Pengurus;
         $pengurus->name = $request->input('name');
         $pengurus->jabatan_id = $request->input('jabatan_id');
         $pengurus->periode = $request->input('periode');
         $pengurus->foto = $destinationPath;
         $pengurus->save();
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('pengurus');
    }

    public function edit($id)
     {
        $title = 'Pengurus';
        $subtitle = 'Edit Pengurus';
        $jab = Jabatan::latest()->get();
        $pengurus = Pengurus::where('id',$id)->first();

        return view('pengurus.edit', compact('title', 'subtitle', 'pengurus', 'jab'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'name'=>'required',
    		'jabatan_id'=>'required',
    		'periode'=>'required',
            'foto' => 'max:2048', // Maksimal 2 MB
         ]);

         if ($request->hasFile('foto')) {
         $picName = $request->file('foto')->getClientOriginalExtension();
         $picName = Carbon::now()->timestamp. '.' . $picName;
         $destinationPath = 'assets/img/pengurus/' . $picName;
         $img = Image::make($request->file('foto'));
         $img->resize(165, 165);
         $img->save($destinationPath);

         $pengurus = Pengurus::find($id);
         $pengurus->name = $request->input('name');
         $pengurus->jabatan_id = $request->input('jabatan_id');
         $pengurus->periode = $request->input('periode');
         $oldFile = $pengurus->foto;
         if (file_exists($destinationPath)) {
            unlink($oldFile);
         }
         $pengurus->foto = $destinationPath;
         $pengurus->save();
            Alert::success('Success', 'Data Berhasil di Update');
            return redirect('pengurus');
         } else {
            $pengurus = Pengurus::find($id);
            $pengurus->name = $request->input('name');
            $pengurus->jabatan_id = $request->input('jabatan_id');
            $pengurus->periode = $request->input('periode');
            $pengurus->save();
            Alert::success('Success', 'Data Berhasil di Update');
            return redirect('pengurus');
         } 
    }

    public function delete($id)
    {
        Pengurus::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('pengurus');
    }
}

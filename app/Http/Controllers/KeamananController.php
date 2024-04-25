<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Keamanan;
use App\Models\Jabatan;
use Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class KeamananController extends Controller
{
    public function index()
    {
        $title = 'Personil Keamanan';
        $subtitle = 'Keamanan RW';
        $keamanan = Keamanan::with('jabatans')->latest()->get();
        return view('keamanan.index', compact('title', 'subtitle', 'keamanan'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $keamanan = Keamanan::with('jabatans')->get();
        $response=[
            'status'=>'success',
            'message'=>'keamanan list',
            'data' => $keamanan,
        ];
        return response()->json($response, 200);
    }

    public function yajra(){
        $keamanan = Keamanan::with('jabatans')->select([
            'id', 'name', 'jabatan_id', 'periode', 'nohp', 'foto']);
        $datatables = Datatables::of($keamanan)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="keamanan/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
            <a href="jadwal/'.$head->id.'" class="btn btn-sm btn-primary"> Jadwal</a></center>';
        });
        return $datatables->make(true);
    }

    public function view($id)
    {
       $keamanan = Keamanan::where('id',$id)->with('jabatans')->first();
       $response=[
        'status'=>'success',
        'message'=>'keamanan View',
        'data' => $keamanan,
    ];
    return response()->json($response, 200);
   }


    public function add()
    {
        $title = 'RW';
        $subtitle = 'Add Personil keamanan';
        $jab = Jabatan::latest()->get();
        return view('keamanan.add', compact('title', 'subtitle', 'jab'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
    		'jabatan_id'=>'required',
    		'periode'=>'required',
            'foto' => 'file|image|max:2048', // Maksimal 2 MB
         ]);

         if ($request->hasFile('foto')) {
            $picName = $request->file('foto')->getClientOriginalExtension();
            $picName = Carbon::now()->timestamp. '.' . $picName;
            $uploadedImage = $request->foto->move(public_path('assets/img/pengurus/'), $picName);
            $destinationPath = 'assets/img/pengurus/' . $picName;
            $img = Image::make($uploadedImage);
            $img->resize(265, 265);
            $img->save($uploadedImage);

            $keamanan = new Keamanan;
            $keamanan->name = $request->input('name');
            $keamanan->jabatan_id = $request->input('jabatan_id');
            $keamanan->periode = $request->input('periode');
            $keamanan->nohp = $request->input('no');
            $keamanan->foto = $destinationPath;
            $keamanan->save();
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('keamanan');
         } else {
            $keamanan = new Keamanan;
            $keamanan->name = $request->input('name');
            $keamanan->jabatan_id = $request->input('jabatan_id');
            $keamanan->periode = $request->input('periode');
            $keamanan->nohp = $request->input('no');
            $keamanan->save();
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('keamanan');
         }
    }

    public function edit($id)
     {
        $title = 'keamanan';
        $subtitle = 'Edit keamanan';
        $jab = Jabatan::latest()->get();
        $keamanan = Keamanan::where('id',$id)->first();
        return view('keamanan.edit', compact('title', 'subtitle', 'keamanan', 'jab'));
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
            $uploadedImage = $request->foto->move(public_path('assets/img/pengurus/'), $picName);
            $destinationPath = 'assets/img/pengurus/' . $picName;
            $img = Image::make($uploadedImage);
            $img->resize(265, 265);
            $img->save($uploadedImage);

            $keamanan = Keamanan::find($id);
            $keamanan->name = $request->input('name');
            $keamanan->jabatan_id = $request->input('jabatan_id');
            $keamanan->periode = $request->input('periode');
            $keamanan->nohp = $request->input('no');
            $oldFile = $keamanan->foto;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            } 
            $keamanan->foto = $destinationPath;
            $keamanan->save();
                Alert::success('Success', 'Data Berhasil di Update');
            return redirect('keamanan');
         } else {
            $keamanan = Keamanan::find($id);
            $keamanan->name = $request->input('name');
            $keamanan->jabatan_id = $request->input('jabatan_id');
            $keamanan->periode = $request->input('periode');
            $keamanan->nohp = $request->input('no');
            $keamanan->save();
            Alert::success('Success', 'Data Berhasil di Update');
            return redirect('keamanan');
         } 
    }

}

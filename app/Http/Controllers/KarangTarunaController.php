<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\KarangTaruna;
use App\Models\Jabatan;
use Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
class KarangTarunaController extends Controller
{
    public function index()
    {
        $title = 'Karang Taruna';
        $subtitle = 'RW 09';
        $taruna = KarangTaruna::with('jabatans')->latest()->get();
        return view('taruna.index', compact('title', 'subtitle', 'taruna'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $taruna = KarangTaruna::with('jabatans')->get();
        $response=[
            'status'=>'success',
            'message'=>'taruna list',
            'data' => $taruna,
        ];
        return response()->json($response, 200);
    }

    public function yajra(){
        $taruna = KarangTaruna::with('jabatans')->select([
            'id', 'name', 'jabatan_id', 'periode', 'nohp', 'foto']);
        $datatables = Datatables::of($taruna)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="karang-taruna/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Karang Taruna';
        $subtitle = 'Add taruna';
        $jab = Jabatan::latest()->get();
        return view('taruna.add', compact('title', 'subtitle', 'jab'));
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
            $uploadedImage = $request->foto->move(public_path('assets/img/taruna/'), $picName);
            $destinationPath = 'assets/img/taruna/' . $picName;
            $img = Image::make($uploadedImage);
            $img->resize(265, 265);
            $img->save($uploadedImage);

            $taruna = new KarangTaruna;
            $taruna->name = $request->input('name');
            $taruna->jabatan_id = $request->input('jabatan_id');
            $taruna->periode = $request->input('periode');
            $taruna->nohp = $request->input('no');
            $taruna->foto = $destinationPath;
            $taruna->save();
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('karang-taruna');
         } else {
            $taruna = new KarangTaruna;
            $taruna->name = $request->input('name');
            $taruna->jabatan_id = $request->input('jabatan_id');
            $taruna->periode = $request->input('periode');
            $taruna->nohp = $request->input('no');
            $taruna->save();
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('karang-taruna');
         }
    }

    public function edit($id)
     {
        $title = 'Karang Taruna';
        $subtitle = 'Edit taruna';
        $jab = Jabatan::latest()->get();
        $taruna = KarangTaruna::where('id',$id)->first();

        return view('taruna.edit', compact('title', 'subtitle', 'taruna', 'jab'));
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
            $uploadedImage = $request->foto->move(public_path('assets/img/taruna/'), $picName);
            $destinationPath = 'assets/img/taruna/' . $picName;
            $img = Image::make($uploadedImage);
            $img->resize(265, 265);
            $img->save($uploadedImage);

            $taruna = KarangTaruna::find($id);
            $taruna->name = $request->input('name');
            $taruna->jabatan_id = $request->input('jabatan_id');
            $taruna->periode = $request->input('periode');
            $taruna->nohp = $request->input('no');
            $oldFile = $taruna->foto;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            } 
            $taruna->foto = $destinationPath;
            $taruna->save();
                Alert::success('Success', 'Data Berhasil di Update');
            return redirect('karang-taruna');
         } else {
            $taruna = KarangTaruna::find($id);
            $taruna->name = $request->input('name');
            $taruna->jabatan_id = $request->input('jabatan_id');
            $taruna->periode = $request->input('periode');
            $taruna->nohp = $request->input('no');
            $taruna->save();
            Alert::success('Success', 'Data Berhasil di Update');
            return redirect('karang-taruna');
         } 
    }

    public function delete($id)
    {
        KarangTaruna::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('karang-taruna');
    }
}

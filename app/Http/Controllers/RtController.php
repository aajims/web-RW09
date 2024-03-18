<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use DataTables;
use App\Models\Rt;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class RtController extends Controller
{
    public function index()
    {
        $title = 'Data RT';
        $subtitle = 'Data RT';
        $data = Rt::all();
        return view('rt.index', compact('title', 'subtitle', 'data'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $data = Rt::all();
        $response=[
            'status'=>'success',
            'message'=>'list Data RT',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $kategori = Rt::select([
            'id', 'nama', 'foto', 'ketua', 'sekertaris', 'bendahara']);
        $datatables = Datatables::of($kategori)
        ->addIndexColumn()
        ->addColumn('action',function($rows){
            return '<center><a href="rt/'.$rows->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });

        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Data RT';
        $subtitle = 'Add Data RT';
        return view('rt.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'nama'=>'required',
    		'ketua'=>'required',
    		'sekertaris'=>'required',
    		'bendahara'=>'required',
         ]);

         if ($request->hasFile('foto')) {
            $picName = $request->file('foto')->getClientOriginalExtension();
            $picName = Carbon::now()->timestamp. '.' . $picName;
            $uploadedImage = $request->foto->move(public_path('assets/img/rt/'), $picName);
            $destinationPath = 'assets/img/rt/'.$picName;
            $img = Image::make($uploadedImage);
            $img->resize(165, 165);
            $img->save($uploadedImage);

            $rt = new Rt;
            $rt->nama = $request->input('nama');
            $rt->ketua = $request->input('ketua');
            $rt->foto = $destinationPath;
            $rt->sekertaris = $request->input('sekertaris');
            $rt->bendahara = $request->input('bendahara');
            $rt->save();
         if (response()->json('code' == 200)) {
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('rt');
         }
        } else {
            $rt = new Rt;
            $rt->nama = $request->input('nama');
            $rt->ketua = $request->input('ketua');
            $rt->sekertaris = $request->input('sekertaris');
            $rt->bendahara = $request->input('bendahara');
            $rt->save();
            if (response()->json('code' == 200)) {
                Alert::success('Success', 'Data Berhasil di Simpan');
                return redirect('rt');
            }
        }
    }

    public function edit($id)
     {
        $title = 'Data Rt';
        $subtitle = 'Edit data Rt';
        $rt = Rt::where('id',$id)
        ->first();
        return view('rt.edit', compact('title', 'subtitle', 'rt'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'ketua'=>'required',
    		'sekertaris'=>'required',
    		'bendahara'=>'required',
         ]);

        if ($request->hasFile('foto')) {
        $picName = $request->file('foto')->getClientOriginalExtension();
        $picName = Carbon::now()->timestamp. '.' . $picName;
        $uploadedImage = $request->foto->move(public_path('assets/img/rt/'), $picName);
        $destinationPath = 'assets/img/rt/'.$picName;
        $img = Image::make($uploadedImage);
        $img->resize(165, 165);
        $img->save($uploadedImage);

         $rt = Rt::find($id);
         $rt->nama = $request->input('nama');
         $oldFile = $rt->foto;
         if (file_exists($oldFile)) {
            unlink($oldFile);
         }
         $rt->foto = $destinationPath;
         $rt->ketua = $request->input('ketua');
         $rt->sekertaris = $request->input('sekertaris');
         $rt->bendahara = $request->input('bendahara');
         $rt->save();
         if (response()->json('code' == 200)) {
            Alert::toast('Data Berhasil di Update', 'success');
            return redirect('rt');
         }
        } else {
            $rt = Rt::find($id);
            $rt->nama = $request->input('nama');
            $rt->ketua = $request->input('ketua');
            $rt->sekertaris = $request->input('sekertaris');
            $rt->bendahara = $request->input('bendahara');
            $rt->save();
            if (response()->json('code' == 200)) {
               Alert::toast('Data Berhasil di Update', 'success');
               return redirect('rt');
            }
        }
    }

    public function delete($id)
    {
        Rt::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('rt');
    }
}

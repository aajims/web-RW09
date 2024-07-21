<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use DataTables;
use App\Models\Penduduk;
use App\Models\Rt;
use Auth;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $title = 'Penduduk';
        $subtitle = 'Data Penduduk';
        $data = Penduduk::with('rts')->latest()->get();
        return view('penduduk.index', compact('title', 'subtitle', 'data'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $data = Penduduk::with('rts')->latest()->paginate(15);
        $response=[
            'status'=>'success',
            'message'=>'Keuangan list',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    public function view($id) {
        $data = Penduduk::with('rts')
        ->where('id', $id)->first();
        $response=[
            'status'=>'success',
            'message'=>'List Data Penduduk',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $user = Auth::user();
        if ($user->role == 'Admin') {
            $kategori = Penduduk::with('rts')->select([
                'id', 'rt_id', 'nama_lengkap', 'jk', 'status_perkawinan', 'pendidikan_terakhir', 'status_keluarga'])->latest()->get();
                $datatables = Datatables::of($kategori)
                ->addIndexColumn()
            ->addColumn('action',function($rows){
                return '<center>
                <a href="penduduk/detail/'.$rows->id.'" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>';
            });
            return $datatables->make(true);
        }
        $kategori = Penduduk::where('role', $user->role)->with('rts')->select([
            'id', 'rt_id', 'nama_lengkap', 'jk', 'status_perkawinan', 'pendidikan_terakhir', 'status_keluarga'])->latest();
        $datatables = Datatables::of($kategori)
        ->addIndexColumn()
        ->addColumn('action',function($rows){
            return '<center>
            <a href="penduduk/detail/'.$rows->id.'" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>
            <a href="penduduk/'.$rows->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Data Penduduk';
        $subtitle = 'Penduduk';
        $rt = Rt::all();
        return view('Penduduk.add', compact('title', 'subtitle', 'rt'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'nama_lengkap'=>'required',
    		'alamat'=>'required',
    		'jk'=>'required',
    		'status_perkawinan'=>'required',
    		'tempat'=>'required',
    		'tgl_lahir'=>'required',
    		'agama'=>'required',
    		'pendidikan_terakhir'=>'required',
    		'pekerjaan'=>'required',
    		'status_keluarga'=>'required',
    		'status_rumah_tinggal'=>'required',
    		'status_ekonomi'=>'required'
         ]);
         $user = Auth::user();
         $penduduk = new Penduduk;
         if ($user->role == 'Staff23') {
            $penduduk->rt_id = 1;
         } elseif ($user->role == 'Staff24') {
            $penduduk->rt_id = 2;
         } elseif ($user->role == 'Staff25') {
            $penduduk->rt_id = 3;
         } elseif ($user->role == 'Staff26') {
            $penduduk->rt_id = 4;
         } elseif ($user->role == 'Staff27') {
            $penduduk->rt_id = 5;
         } elseif ($user->role == 'Staff28') {
            $penduduk->rt_id = 6;
         } elseif ($user->role == 'Staff29') {
            $penduduk->rt_id = 7;
         } elseif ($user->role == 'Staff41') {
            $penduduk->rt_id = 8;
         } elseif ($user->role == 'Staff48') {
            $penduduk->rt_id = 9;
         } else {
            $penduduk->rt_id = 0;
         }
         $penduduk->nama_lengkap = $request->input('nama_lengkap');
         $penduduk->alamat = $request->input('alamat');
         $penduduk->jk = $request->input('jk');
         $penduduk->status_perkawinan = $request->input('status_perkawinan');
         $penduduk->tempat = $request->input('tempat');
         $penduduk->tgl_lahir = $request->input('tgl_lahir');
         $penduduk->agama = $request->input('agama');
         $penduduk->pendidikan_terakhir = $request->input('pendidikan_terakhir');
         $penduduk->pekerjaan = $request->input('pekerjaan');
         $penduduk->status_keluarga = $request->input('status_keluarga');
         $penduduk->status_rumah_tinggal = $request->input('status_rumah_tinggal');
         $penduduk->status_ekonomi = $request->input('status_ekonomi');
         $penduduk->role = $user->role;
         $penduduk->save();
         if (response()->json('code' == 200)) {
            Alert::toast('Data Berhasil di Simpan', 'success');
            return redirect('penduduk');
         }
    }

    public function edit($id)
     {
        $title = 'Penduduk';
        $subtitle = 'Edit Penduduk';
        $rt = Rt::all();
        $penduduk = Penduduk::where('id',$id)
        ->first();
        return view('penduduk.edit', compact('title', 'subtitle', 'penduduk', 'rt'));
    }

    public function detail($id)
     {
        $title = 'Penduduk';
        $subtitle = 'View Penduduk';
        $penduduk = Penduduk::where('id',$id)
        ->first();
        return view('penduduk.view', compact('title', 'subtitle', 'penduduk'));
    }


    public function update(Request $request, $id){
    	$this->validate($request,[
    		'nama_lengkap'=>'required',
    		'alamat'=>'required',
    		'jk'=>'required',
    		'status_perkawinan'=>'required',
    		'tempat'=>'required',
    		'tgl_lahir'=>'required',
    		'agama'=>'required',
    		'pendidikan_terakhir'=>'required',
    		'pekerjaan'=>'required',
    		'status_keluarga'=>'required',
    		'status_rumah_tinggal'=>'required',
    		'status_ekonomi'=>'required'
         ]);
         $user = Auth::user();
         $penduduk = Penduduk::find($id);
         if ($user->role == 'Staff23') {
            $penduduk->rt_id = 1;
         } elseif ($user->role == 'Staff24') {
            $penduduk->rt_id = 2;
         } elseif ($user->role == 'Staff25') {
            $penduduk->rt_id = 3;
         } elseif ($user->role == 'Staff26') {
            $penduduk->rt_id = 4;
         } elseif ($user->role == 'Staff27') {
            $penduduk->rt_id = 5;
         } elseif ($user->role == 'Staff28') {
            $penduduk->rt_id = 6;
         } elseif ($user->role == 'Staff29') {
            $penduduk->rt_id = 7;
         } elseif ($user->role == 'Staff41') {
            $penduduk->rt_id = 8;
         } elseif ($user->role == 'Staff48') {
            $penduduk->rt_id = 9;
         } else {
            $penduduk->rt_id = 0;
         }
         $penduduk->nama_lengkap = $request->input('nama_lengkap');
         $penduduk->alamat = $request->input('alamat');
         $penduduk->jk = $request->input('jk');
         $penduduk->status_perkawinan = $request->input('status_perkawinan');
         $penduduk->tempat = $request->input('tempat');
         $penduduk->tgl_lahir = $request->input('tgl_lahir');
         $penduduk->agama = $request->input('agama');
         $penduduk->pendidikan_terakhir = $request->input('pendidikan_terakhir');
         $penduduk->pekerjaan = $request->input('pekerjaan');
         $penduduk->status_keluarga = $request->input('status_keluarga');
         $penduduk->status_rumah_tinggal = $request->input('status_rumah_tinggal');
         $penduduk->status_ekonomi = $request->input('status_ekonomi');
         $penduduk->role = $user->role;
         $penduduk->save();
         if (response()->json('code' == 200)) {
            Alert::toast('Data Berhasil di Update', 'success');
            return redirect('penduduk');
         }
    }

    public function delete($id)
    {
        Penduduk::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('penduduk');
    }
}

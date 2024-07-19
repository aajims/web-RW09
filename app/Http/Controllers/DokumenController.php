<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Dokumen;
use Alert;
use Carbon\Carbon;
use Illuminate\support\Str;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $title = 'Data Dokumen';
        $subtitle = 'List Dokumen';
        $dokumen = Dokumen::all();
        return view('dokumen.index', compact('title', 'subtitle', 'dokumen'));
    }

    public function list() {
        $dokumen = Dokumen::select([
            'id', 'title', 'slug', 'content'])->get();
        $response=[
            'status'=>'success',
            'message'=>'dokumen list',
            'data' => $dokumen,
        ];
        return response()->json($response, 200);
    }

    public function detail($slug) {
        $dokumen = Dokumen::where('slug', $slug)->first();
        $response=[
            'status'=>'success',
            'message'=>'dokumen Detail',
            'data' => $dokumen,
        ];
        return response()->json($response, 200);
    }
    public function yajra(Request $request){
        $users = Dokumen::select([
            'id', 'title', 'slug', 'file']);
        $datatables = Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="dokumen/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></center>';
        });

        return $datatables->make(true);
    }
    public function add()
    {
        $title = 'dokumen';
        $subtitle = 'Add dokumen';
        return view('dokumen.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'title'=>'required',
    		'document'=>'required'
         ]);
         $file = $request->file('document');
         $fileName = Carbon::now()->timestamp. '.' . $file->getClientOriginalExtension();
         $file->move(public_path('assets/doc'), $fileName);
         $destinationPath = 'assets/doc/' . $fileName;
        
         Dokumen::insert([
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'content'=> $request->content,
            'file'=> $destinationPath,

         ]);
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('dokumen');
    }

    public function edit($id)
     {
        $title = 'Dokumen';
        $subtitle = 'Edit Dokumen';
        $dokumen = Dokumen::where('id',$id)->first();
        return view('dokumen.edit', compact('title', 'subtitle', 'dokumen'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'title'=>'required'
         ]);
         $file = $request->file('document');
         $fileName = Carbon::now()->timestamp. '.' . $file->getClientOriginalExtension();
         $file->move(public_path('assets/doc'), $fileName);
         $destinationPath = 'assets/doc/' . $fileName;

    	Dokumen::where('id',$id)->update([
    		'title'=> $request->title,
    		'slug'=> Str::slug($request->title),
            'content'=> $request->content,
            'file'=> $destinationPath,
        ]);
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('dokumen');
    }
}

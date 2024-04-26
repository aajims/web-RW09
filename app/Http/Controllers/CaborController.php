<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Cabor;
use Alert;
use Carbon\Carbon;
use Image;
use Illuminate\support\Str;
use Illuminate\Http\Request;

class CaborController extends Controller
{
    public function index()
    {
        $title = 'Data Cabang Olahraga';
        $subtitle = 'List Cabang Olahraga';
        return view('cabor.index', compact('title', 'subtitle'));
    }

    public function list() {
        $cabor = Cabor::all();
        $response=[
            'status'=>'success',
            'message'=>'Cabang Olahraga list',
            'data' => $cabor,
        ];
        return response()->json($response, 200);
    }

    public function detail($id) {
        $cabor = Cabor::where('id',$id)->first();
        $response=[
            'status'=>'success',
            'message'=>'Cabang Olahraga Detail',
            'data' => $cabor,
        ];
        return response()->json($response, 200);
    }

    public function yajra(){
        $users = Cabor::select([
            'id', 'name', 'slug', 'lokasi']);
        $datatables = Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="cabor/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></center>';
        });
        return $datatables->make(true);
    }
    public function add()
    {
        $title = 'Cabang Olahraga';
        $subtitle = 'Add Cabang Olahraga';
        return view('cabor.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'name'=>'required',
    		'lokasi'=>'required',
            'logo' => 'file|image|max:1024', // Maksimal 1 MB
         ]);
            $picName = $request->file('logo')->getClientOriginalExtension();
            $picName = Carbon::now()->timestamp. '.' . $picName;
            $uploadedImage = $request->logo->move(public_path('assets/img/cabor/'), $picName);
            $destinationPath = $picName;
            $img = Image::make($uploadedImage);
            $img->resize(96, 96);
            $img->save($uploadedImage);
         $cabor = new Cabor;
         $cabor->name = $request->name;
         $cabor->lokasi = $request->lokasi;
         $cabor->slug = Str::slug($request->name);
         $cabor->logo = $destinationPath;
         $cabor->save();
        
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('cabor');
    }

    public function edit($id)
     {
        $title = 'Cabang Olahraga';
        $subtitle = 'Edit Cabang Olahraga';
        $cabor = Cabor::where('id',$id)->first();

        return view('cabor.edit', compact('title', 'subtitle', 'cabor'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'name'=>'required',
            'lokasi'=>'required'
         ]);
         if ($request->hasFile('logo')) {
            $picName = $request->file('logo')->getClientOriginalExtension();
            $picName = Carbon::now()->timestamp. '.' . $picName;
            $uploadedImage = $request->logo->move(public_path('assets/img/cabor/'), $picName);
            $destinationPath = $picName;
            $img = Image::make($uploadedImage);
            $img->resize(96, 96);
            $img->save($uploadedImage);
   
            $foto = Cabor::find($id);
            $foto->name = $request->input('name');
            $foto->lokasi = $request->input('lokasi');
            $foto->slug = Str::slug($request->input('name'));
            $oldFile = $foto->logo;
            if (file_exists($oldFile)) {
               unlink($oldFile);
            }
            $foto->logo = $destinationPath;
            $foto->save();
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('cabor');
        } else {
            $foto = Cabor::find($id);
            $foto->name = $request->input('name');
            $foto->lokasi = $request->input('lokasi');
            $foto->slug = Str::slug($request->input('name'));
            $foto->save();
           Alert::success('Success', 'Data Berhasil di Update');
            return redirect('cabor');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\AgendaKegiatan;
use Carbon\Carbon;
use Image;
use Alert;
use DataTables;

class FotoController extends Controller
{
    public function index()
    {
        $title = 'Data Galery';
        $subtitle = 'Foto';
        return view('foto.index', compact('title', 'subtitle'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $foto = Foto::with('agenda')->orderByDesc('id')->paginate(15);
        $response=[
            'status'=>'success',
            'message'=>'Foto list',
            'data' => $foto,
        ];
        return response()->json($response, 200);
    }

    public function slide() {
        $foto = Foto::with('agenda')->orderByDesc('id')->skip(0)->take(6)->get();
        $response=[
            'status'=>'success',
            'message'=>'Foto list',
            'data' => $foto,
        ];
        return response()->json($response, 200);
    }

    public function view($id) {
        $foto = Foto::with('agenda')
        ->where('agenda_id', $id)
        ->get();
        $response=[
            'status'=>'success',
            'message'=>'Foto list',
            'data' => $foto,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $foto = Foto::with('agenda')->select([
            'id', 'agenda_id', 'caption', 'images'])->orderByDesc('id');
        $datatables = Datatables::of($foto)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="foto/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        });
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Data Foto';
        $subtitle = 'Add Foto';
        $ag = AgendaKegiatan::latest()->get();
        return view('foto.add', compact('title', 'subtitle', 'ag'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'caption'=>'required',
    		'agenda_id'=>'required',
            'images' => 'file|image|max:2048', // Maksimal 2 MB
         ]);

         $picName = $request->file('images')->getClientOriginalExtension();
         $picName = Carbon::now()->timestamp. '.' . $picName;
         $uploadedImage = $request->images->move(public_path('assets/img/foto/'), $picName);
         $destinationPath = 'assets/img/foto/' . $picName;
         $img = Image::make($uploadedImage);
         $img->resize(405, 405);
         $img->save($uploadedImage);

         $foto = new Foto;
         $foto->agenda_id = $request->input('agenda_id');
         $foto->caption = $request->input('caption');
         $foto->images = $destinationPath;
         $foto->save();
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('foto');
    }

    public function edit($id)
     {
        $title = 'Foto';
        $subtitle = 'Edit Foto';
        $ag = AgendaKegiatan::latest()->get();
        $foto = Foto::where('id',$id)->first();

        return view('foto.edit', compact('title', 'subtitle', 'foto', 'ag'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
            'caption'=>'required',
    		'agenda_id'=>'required',
            'images' => 'file|image|max:2048', // Maksimal 2 MB
         ]);

         if ($request->hasFile('images')) {
         $picName = $request->file('images')->getClientOriginalExtension();
         $picName = Carbon::now()->timestamp. '.' . $picName;
         $uploadedImage = $request->images->move(public_path('assets/img/foto/'), $picName);
         $destinationPath = 'assets/img/foto/' . $picName;
         $img = Image::make($uploadedImage);
         $img->resize(405, 405);
         $img->save($uploadedImage);

         $foto = Foto::find($id);
         $foto->agenda_id = $request->input('agenda_id');
         $foto->caption = $request->input('caption');
         $oldFile = $foto->foto;
         if (file_exists($oldFile)) {
            unlink($oldFile);
         }
         $foto->images = $destinationPath;
         $foto->save();
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('foto');
        } else {
            $foto = Foto::find($id);
            $foto->agenda_id = $request->input('agenda_id');
            $foto->caption = $request->input('caption');
            $foto->save();
           Alert::success('Success', 'Data Berhasil di Update');
            return redirect('foto');
        }
    }

    public function delete($id)
    {
        Foto::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('foto');
    }
}

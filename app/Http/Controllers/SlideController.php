<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use DataTables;
use App\Models\Slide;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SlideController extends Controller
{
    public function index()
    {
        $title = 'Data Slide';
        $subtitle = 'Data Slide';
        $data = Slide::all();
        return view('slide.index', compact('title', 'subtitle', 'data'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $data = Slide::all();
        $response=[
            'status'=>'success',
            'message'=>'list Data Slide',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $kategori = Slide::select([
            'id', 'title', 'image', 'detail', 'status']);
        $datatables = Datatables::of($kategori)
        ->addColumn('status_text', function($rows) {
            return $rows->status == 1 ? 'Aktif' : 'Tidak Aktif';
        })
        ->addIndexColumn()
        ->addColumn('action',function($rows){
            return '<center><a href="slide/'.$rows->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
        })
        ->rawColumns(['status_text', 'action']);
        return $datatables->make(true);
    }

    public function add()
    {
        $title = 'Data slide';
        $subtitle = 'Add Data slide';
        return view('slide.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'title'=>'required',
    		'image'=>'required',
    		'detail'=>'required',
         ]);

         $picName = $request->file('image')->getClientOriginalExtension();
         $picName = Carbon::now()->timestamp. '.' . $picName;
         $destinationPath = 'assets/img/slide/' . $picName;
         $img = Image::make($request->file('image'));
         $img->resize(365, 165);
         $img->save(public_path($destinationPath));

         $slide = new slide;
         $slide->title = $request->input('title');
         $slide->detail = $request->input('detail');
         $slide->image = $destinationPath;
         $slide->status = 1;
         $slide->save();
         if (response()->json('code' == 200)) {
            Alert::success('Success', 'Data Berhasil di Simpan');
            return redirect('slide');
         }
    }

    public function edit($id)
     {
        $title = 'Data slide';
        $subtitle = 'Edit data slide';
        $slide = Slide::where('id',$id)
        ->first();
        return view('slide.edit', compact('title', 'subtitle', 'slide'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'title'=>'required',
    		'detail'=>'required',
         ]);
         if ($request->hasFile('image')) {
            $picName = $request->file('image')->getClientOriginalExtension();
            $picName = Carbon::now()->timestamp. '.' . $picName;
            $destinationPath = storage_path().'assets/img/slide/' . $picName;
            $img = Image::make($request->file('image'));
            $img->resize(365, 165);
            $img->save(public_path($destinationPath));
         
            $slide = Slide::find($id);
            $oldFile = $slide->image;
            if (file_exists($oldFile)) {
                unlink($oldFile);
             }
            $slide->title = $request->input('title');
            $slide->detail = $request->input('detail');
            $slide->image = $destinationPath;
            $slide->status = $request->input('status');;
            $slide->save();
            if (response()->json('code' == 200)) {
                Alert::toast('Data Berhasil di Update', 'success');
                return redirect('slide');
            }
         } else {
            $slide = Slide::find($id);
            $slide->title = $request->input('title');
            $slide->image = $request->input('oldImage');
            $slide->detail = $request->input('detail');
            $slide->status = $request->input('status');;
            $slide->save();
            if (response()->json('code' == 200)) {
               Alert::toast('Data Berhasil di Update', 'success');
               return redirect('slide');
            }
         }
    }

    public function delete($id)
    {
        Slide::destroy($id);
        Alert::success('Success', 'Data Berhasil di Hapus');
         return redirect('slide');
    }
}

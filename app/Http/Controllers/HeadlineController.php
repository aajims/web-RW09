<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Headline;
use Alert;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        $title = 'Data Headline';
        $subtitle = 'List Headline';
        $headline = Headline::all();
        return view('headline.index', compact('title', 'subtitle', 'headline'))
        ->with('no', (request()->input('page', 1) - 1));
    }

    public function list() {
        $headline = Headline::all();
        $response=[
            'status'=>'success',
            'message'=>'Headline list',
            'data' => $headline,
        ];
        return response()->json($response, 200);
    }

    public function yajra(Request $request){
        $users = Headline::select([
            'id', 'title', 'content', 'status']);
        $datatables = Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="headline/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
            <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$head->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteData"><i class="fa fa-trash"></i> Delete</a></center>';
        });

        return $datatables->make(true);
    }
    public function add()
    {
        $title = 'Headline';
        $subtitle = 'Add Headline';
        return view('headline.add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'nama'=>'required',
    		'content'=>'required',
    		'status'=>'required'
         ]);
         Headline::insert([
            'title'=>$request->nama,
            'content'=>$request->content,
            'status'=>$request->status
         ]);
         Alert::success('Success', 'Data Headline Berhasil di Simpan');
         return redirect('headline');
    }

    public function edit($id)
     {
        $title = 'Headline';
        $subtitle = 'Edit Headline';
        $dt = Headline::where('id',$id)->first();

        return view('headline.edit', compact('title', 'subtitle', 'dt'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'nama'=>'required',
            'content'=>'required',
    		'status'=>'required'
         ]);
    	Headline::where('id',$id)->update([
    		'title'=>$request->nama,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
        Alert::success('Success', 'Data Headline Berhasil di Update');
         return redirect('headline');
    }

    public function delete($id)
    {
        Headline::destroy($id);
        Alert::success('Success', 'Data Headline Berhasil di Hapus');
         return redirect('headline');
    }
}

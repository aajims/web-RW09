<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Pertandingan;
use App\Models\Cabor;
use Alert;
use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    public function index()
    {
        $title = 'Data Pertandingan';
        $subtitle = 'List Pertandingan';
        return view('pertandingan.index', compact('title', 'subtitle'));
    }

    public function volley() {
        $pertandingan = Pertandingan::where('cabor_id', '1')->with('cabors')->latest()->get();
        $response=[
            'status'=>'success',
            'message'=>'pertandingan Volley list',
            'data' => $pertandingan,
        ];
        return response()->json($response, 200);
    }

    public function badminton() {
        $pertandingan = Pertandingan::where('cabor_id', '2')->with('cabors')->latest()->get();
        $response=[
            'status'=>'success',
            'message'=>'pertandingan Badminton list',
            'data' => $pertandingan,
        ];
        return response()->json($response, 200);
    }

    public function tenis() {
        $pertandingan = Pertandingan::where('cabor_id', '3')->with('cabors')->latest()->get();
        $response=[
            'status'=>'success',
            'message'=>'pertandingan Tenis list',
            'data' => $pertandingan,
        ];
        return response()->json($response, 200);
    }

    public function futsal() {
        $pertandingan = Pertandingan::where('cabor_id', '4')->with('cabors')->latest()->get();
        $response=[
            'status'=>'success',
            'message'=>'pertandingan Futsal list',
            'data' => $pertandingan,
        ];
        return response()->json($response, 200);
    }

    public function yajra(){
        $users = Pertandingan::with('cabors')->select([
            'id', 'cabor_id', 'waktu', 'team_a', 'team_b', 'score']);
        $datatables = Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function($head){
            return '<center><a href="pertandingan/'.$head->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a></center>';
        });

        return $datatables->make(true);
    }
    public function add()
    {
        $title = 'pertandingan';
        $subtitle = 'Add pertandingan';
        $cabor = Cabor::all();
        return view('pertandingan.add', compact('title', 'subtitle', 'cabor' ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'cabor_id'=>'required',
    		'waktu'=>'required'
         ]);
         Pertandingan::insert([
            'cabor_id'=> $request->cabor_id,
            'waktu'=> $request->waktu,
            'team_a'=> $request->team_a,
            'team_b'=> $request->team_b
         ]);
         Alert::success('Success', 'Data Berhasil di Simpan');
         return redirect('pertandingan');
    }

    public function edit($id)
     {
        $title = 'pertandingan';
        $subtitle = 'Edit pertandingan';
        $cabor = Cabor::all();
        $pertandingan = Pertandingan::where('id',$id)->first();

        return view('pertandingan.edit', compact('title', 'subtitle', 'pertandingan', 'cabor'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
            'cabor_id'=>'required',
    		'waktu'=>'required'
         ]);
    	Pertandingan::where('id',$id)->update([
    		'cabor_id'=> $request->cabor_id,
            'waktu'=> $request->waktu,
            'team_a'=> $request->team_a,
            'team_b'=> $request->team_b,
            'score'=> $request->score
        ]);
        Alert::success('Success', 'Data Berhasil di Update');
         return redirect('pertandingan');
    }
}

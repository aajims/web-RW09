<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Alert;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    function index() {
        $title = 'Data User';
        $subtitle = 'List User';
        return view('user.user_index', compact('title', 'subtitle'));
    }

    public function yajra() {
        $users = User::select([
            'id', 'name', 'email', 'role']);
        $datatables = Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function($rows){
            return '<center><a href="user/'.$rows->id.'" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a> 
            <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$rows->id.'" data-original-title="Delete" class="btn btn-sm btn-danger deleteData"><i class="fa fa-trash"></i> Delete</a></center>';
        });

        return $datatables
        ->make(true);
    }

    public function add()
    {
        $title = 'Data';
        $subtitle = 'Add User';
        return view('user.user_add', compact('title', 'subtitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
    		'password'=>'required',
    		'nama'=>'required',
    		'email'=>'required',
    		'role'=>'required',
         ]);
         User::insert([
            'password'=>Hash::make($request->password),
            'name'=>$request->nama,
            'email'=>$request->email,
            'role'=>$request->role,
         ]);
         Alert::success('Success', 'Data User Berhasil di Simpan');
         return redirect('user');
    }

    function profile() {
        $title = 'Data Profil';
        $subtitle = 'Data Profil User';
        $user = Auth::user();
        return view('user.view_profil', compact('title', 'subtitle', 'user'));
    }

    public function changePassword(Request $request)
    {
        $this->validate($request,[
    		'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
         ]);
       
        $user = Auth::user();
        // Verifikasi kata sandi saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            Alert::error('Maaf!!', 'Password Lama yang anda input salah');
            return redirect('profil');
        }
        // Update kata sandi baru
        $user->password = Hash::make($request->new_password);
        $user->save();
        Alert::success('Success ', 'Data Password Anda Berhasil di Update');
        return redirect('profil');
    }

    public function edit($id)
     {
        $title = 'Data User';
        $subtitle = 'Edit User';
        $user = User::where('id',$id)->first();

        return view('user.user_edit', compact('title', 'subtitle', 'user'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'nama'=>'required',
    		'email'=>'required',
    		'role'=>'required',
         ]);
        User::where('id',$id)->update([
            'name'=>$request->nama,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        Alert::success('Success Update', 'Data User Berhasil di Update');
        return redirect('user');
    }

    public function delete($id)
    {
        User::destroy($id);
        Alert::success('Delete', 'Data User Berhasil di Delete');
        return redirect('user');
    }
}

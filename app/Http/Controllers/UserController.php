<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        return view('dash.user.data_user', ['user'=>$user, 'no'=>1]);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user = User::where('id_user',$id)->first();

        return view('dash.user.ganti_password',['user' => $user]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::where('id_user',$id)->first();
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('data-user')->with('success', 'Password berhasil diganti');
    }

    public function destroy($id)
    {
    
        $user = User::Where('id',$id);
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data ');
    }
}

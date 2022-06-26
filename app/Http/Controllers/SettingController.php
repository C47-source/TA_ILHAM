<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
  
    public function index()
    {
        return view('dash.setting.ganti_password');
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
        //
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::where('id_user',$id)->first();
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->back()->with('success', 'Password berhasil diganti');
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterPelangganController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'id_user' => ['required','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['required'],
            'alamat' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = New User;
        $user->id_user = $request->id_user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'pelanggan';
        $user->save();

        $pelanggan = new Pelanggan;
        $pelanggan->id_pelanggan = $request->id_user;
        $pelanggan->nm_pelanggan = $request->name;
        $pelanggan->telp = $request->telepon;
        $pelanggan->alamat = $request->alamat;

        $pelanggan->save();

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silahkan Login');
    }

    public function daftar()
    {
        $id = DB::table('pelanggan')->join('users','pelanggan.id_pelanggan','=','users.id_user')->orderBy('id_pelanggan', 'DESC')->first();
        return view('auth.register',['id' => $id]);
    }
}

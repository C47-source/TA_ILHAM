<?php

namespace App\Http\Controllers;

use App\User;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = DB::table('pelanggan')->join('users','pelanggan.id_pelanggan','=','users.id_user')->get();
        $id = DB::table('pelanggan')->orderBy('id_pelanggan', 'DESC')->first();
        return view('dash.pelanggan.data_pelanggan', ['pelanggan' => $pelanggan, 'no' => 1, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|unique:pelanggan',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['required'],
            'alamat' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = New User;
        $user->id_user = $request->id_pelanggan;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'pelanggan';
        $user->save();

        $pelanggan = new Pelanggan;
        $pelanggan->id_pelanggan = $request->id_pelanggan;
        $pelanggan->nm_pelanggan = $request->name;
        $pelanggan->telp = $request->telepon;
        $pelanggan->alamat = $request->alamat;

        $pelanggan->save();

        return redirect('/data-pelanggan')->with('success', 'Berhasil menyimpan data pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->nm_pelanggan = $request->nama;
        $pelanggan->telp = $request->telepon;
        $pelanggan->alamat = $request->alamat;

        $pelanggan->save();

        return redirect('/data-pelanggan')->with('success', 'Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teknisi = Pelanggan::find($id);
        $user = User::Where('id_user',$id);
        $teknisi->delete();
        $user->delete();

        return redirect('/data-pelanggan')->with('success', 'Berhasil Menghapus Data '.$teknisi->nm_pelanggan);
    }
}

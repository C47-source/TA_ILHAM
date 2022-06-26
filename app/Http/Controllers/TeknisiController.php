<?php

namespace App\Http\Controllers;

use App\User;
use App\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teknisi = DB::table('teknisi')->join('users','teknisi.id_teknisi','=','users.id_user')->get();
        $id = DB::table('teknisi')->orderBy('id_teknisi', 'DESC')->first();
        return view('dash.teknisi.data_teknisi',['teknisi' => $teknisi, 'no' => 1,'id' => $id]);
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
            'id_teknisi' => 'required | unique:teknisi',
            'nama' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = New User;
        $user->id_user = $request->id_teknisi;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'teknisi';
        $user->save();

        $teknisi = New Teknisi;
        $teknisi->id_teknisi = $request->id_teknisi;
        $teknisi->nm_teknisi = $request->nama;
        $teknisi->telp = $request->telepon;

        $teknisi->save();

        return redirect('/data-teknisi')->with('success','Berhasil Menyimpan Data Teknisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function show(Teknisi $teknisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Teknisi $teknisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
        ]);

        $teknisi = Teknisi::find($id);
        $user = User::where('id_user', $id)->first();
        $teknisi->nm_teknisi = $request->nama;
        $teknisi->telp = $request->telepon;
        $user->email = $request->email;

        $teknisi->save();
        $user->save();

        return redirect('/data-teknisi')->with('success', 'Berhasil di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teknisi  $teknisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teknisi = Teknisi::find($id);
        $user = User::Where('id_user',$id);

        $teknisi->delete();
        $user->delete();

        return redirect('/data-teknisi')->with('success', 'Berhasil Menghapus Data '.$teknisi->nm_teknisi);
    }
}

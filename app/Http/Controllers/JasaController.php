<?php

namespace App\Http\Controllers;

use App\Jasa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JasaController extends Controller
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
        $jasa = Jasa::all();
        $id = DB::table('jasa')->orderBy('id_jasa','DESC')->first();
        return view('dash.jasa.data_jasa',['jasa' => $jasa,'no' => 1, 'id' => $id,'kd'=>$id]);
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
            'id_jasa' => 'required|unique:jasa',
            'nama_jasa' => 'required',
            'harga'   => 'required|integer',
            'ketegori' => 'required|string'
        ]);

        $jasa = New Jasa;
        $jasa->id_jasa = $request->id_jasa;
        $jasa->nm_jasa = $request->nama_jasa;
        $jasa->harga = $request->harga;
        $jasa->ketegori = $request->ketegori;

        $jasa->save();
        return redirect()->back()->with('success','Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_jasa' => 'required',
            'harga'   => 'required|integer',
            'ketegori' => 'required|string'
        ]);

        $jasa = Jasa::find($id);
        $jasa->nm_jasa = $request->nama_jasa;
        $jasa->harga = $request->harga;
        $jasa->ketegori = $request->ketegori;

        $jasa->save();
        return redirect()->back()->with('success','Berhasil dihapus!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasa = Jasa::find($id);

        $jasa->delete();
        return redirect()->back()->with('success','Berhasil dihapus!');
    }
}

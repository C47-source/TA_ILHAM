<?php

namespace App\Http\Controllers;

use App\Spart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spart = Spart::all();
        $id = DB::table('sparepart')->orderBy('id_sparepart','DESC')->first();
        return view('dash.sparepart.data_sparepart',['spart'=>$spart, 'no' => 1, 'id' => $id]);
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
            'id_sparepart' => 'required|unique:sparepart',
            'nama_sparepart' => 'required',
            'harga' => 'required|numeric',
            'ketegori' => 'required'
        ]);

        $spart = new Spart;
        $spart->id_sparepart = $request->id_sparepart;
        $spart->nm_sparepart = $request->nama_sparepart;
        $spart->harga = $request->harga;
        $spart->ketegori = $request->ketegori;

        $spart->save();

        return redirect()->back()->with('success','Berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spart  $spart
     * @return \Illuminate\Http\Response
     */
    public function show(Spart $spart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spart  $spart
     * @return \Illuminate\Http\Response
     */
    public function edit(Spart $spart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spart  $spart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
           
            'nama_sparepart' => 'required',
            'harga' => 'required|numeric',
            'ketegori' => 'required'
        ]);

        $spart = Spart::find($id);
        
        $spart->nm_sparepart = $request->nama_sparepart;
        $spart->harga = $request->harga;
        $spart->ketegori = $request->ketegori;

        $spart->save();

        return redirect()->back()->with('success','Berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spart  $spart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasa = Spart::find($id);

        $jasa->delete();
        return redirect()->back()->with('success','Berhasil dihapus!');
    }
}

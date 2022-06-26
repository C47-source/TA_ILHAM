<?php

namespace App\Http\Controllers;

use App\DetailService;
use Illuminate\Support\Facades\Request;

class DetailServiceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'id_service' => 'required',
            'nama_unit' => 'required',
            'deskripsi_kerusakan' => 'required',
            'kelengkapan_unit' => 'required'
        ]);

        $detail_service = new DetailService;
        $detail_service->id_service = $request->id_service;
        $detail_service->nm_unit = $request->nama_unit;
        $detail_service->deskripsi_kerusakan = $request->deskripsi_kerusakan;
        $detail_service->kelengkapan_unit = $request->kelengkapan_unit;

        $detail_service->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

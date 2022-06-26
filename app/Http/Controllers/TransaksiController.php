<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\ServiceMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = ServiceMasuk::select(DB::raw('service_masuk.*,SUM(transaksi.harga) as total_harga,pelanggan.nm_pelanggan,detail_service_masuk.nm_unit'))
        ->leftjoin('transaksi','service_masuk.id_service','=','transaksi.id_service')
        ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')
        ->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')
        ->join('users','service_masuk.id_pelanggan','=','users.id_user')
        ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
        ->groupBy('service_masuk.id_service')
        ->where('service_masuk.status',8)->get();

        $pembelian = DB::table('transaksi')
                        ->leftjoin('jasa','transaksi.id_pembelian','=','jasa.id_jasa')
                        ->leftjoin('sparepart','transaksi.id_pembelian','=','sparepart.id_sparepart')
                        ->select('transaksi.*','jasa.nm_jasa','sparepart.nm_sparepart')
                        ->get();
        return view('dash.transaksi.data_transaksi', ['transaksi' => $transaksi, 'no' =>1,'pembelian' => $pembelian]);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show(Transaksi $transaksi)
    {
        //
    }

    
    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

  
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    
}

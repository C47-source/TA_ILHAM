<?php

namespace App\Http\Controllers;

use PDF;
use App\Transaksi;
use App\ServiceMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    
    public function cetak_struk($id)
    {
        $pesan_jasa = ServiceMasuk::find($id);
        $pembelian = DB::table('transaksi')
        ->leftjoin('jasa','transaksi.id_pembelian','=','jasa.id_jasa')
        ->leftjoin('sparepart','transaksi.id_pembelian','=','sparepart.id_sparepart')
        ->select('transaksi.*','jasa.nm_jasa','sparepart.nm_sparepart')->where('id_service',$id)->get();
        $pdf = PDF::loadView('dash.cetak.cetak_struk_pelanggan',['detail' => $pesan_jasa, 'pembelian' => $pembelian]);
        return $pdf->stream();
    }

    public function cetak_laporan(Request $request)
    {
       
        $request->validate([
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
        ]);
        $tgl_awal= $request->tgl_awal;
        $tgl_akhir= $request->tgl_akhir;
        $transaksi = ServiceMasuk::select(DB::raw('service_masuk.*,SUM(transaksi.harga) as total_harga,pelanggan.nm_pelanggan,detail_service_masuk.nm_unit'))
            ->leftjoin('transaksi','service_masuk.id_service','=','transaksi.id_service')
            ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')
            ->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')
            ->join('users','service_masuk.id_pelanggan','=','users.id_user')
            ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
            ->groupBy('service_masuk.id_service')
            ->where('service_masuk.status',8)
            ->whereBetween('tanggal_masuk',[$tgl_awal,$tgl_akhir])->where('status', 8)->get();
        $total= DB::select('select sum(harga) as grand_total FROM transaksi JOIN service_masuk JOIN pelanggan ON transaksi.id_service=service_masuk.id_service AND service_masuk.id_pelanggan = pelanggan.id_pelanggan WHERE service_masuk.status = 8 AND service_masuk.tanggal_masuk BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'" ');

        $pembelian = DB::table('transaksi')
        ->leftjoin('jasa','transaksi.id_pembelian','=','jasa.id_jasa')
        ->leftjoin('sparepart','transaksi.id_pembelian','=','sparepart.id_sparepart')
        ->select('transaksi.*','jasa.nm_jasa','sparepart.nm_sparepart')
        ->get();
        $pdf = PDF::loadView('dash.cetak.cetak_laporan',[
            'transaksi' => $transaksi,  
            'no' => 1,
            'jumlah' => $total,
            'pembelian' => $pembelian,
            'tgl_awal' =>$tgl_awal,
            'tgl_akhir' =>$tgl_akhir,
            ])->setPaper('A4','landscape');
        return $pdf->stream();
    }
}

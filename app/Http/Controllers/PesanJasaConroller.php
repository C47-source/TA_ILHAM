<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Pelanggan;
use App\Transaksi;

use App\ServiceMasuk;
use App\DetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ServiceMasukPelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PesanJasaConroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $pesan_jasa = ServiceMasuk::where([['id_pelanggan',Auth::user()->pelanggan->id_pelanggan],['status','<=',7]])->orderBy('id_service', 'DESC')->get();
        return view('dash.hal_pelanggan.data_pesanan_jasa',['pesan_jasa' => $pesan_jasa]);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'id_service' => 'required|unique:service_masuk',
            'id_pelanggan' => 'required',
            'id_teknisi' => 'required',
            'tanggal_masuk' => 'required',
            'layanan' => 'required',
            'nama_unit' => 'required',
            'kelengkapan' => 'required',
            'deskripsi_kerusakan' => 'required',
        ]);

        $service_masuk = new ServiceMasuk;
        $service_masuk->id_service = $request->id_service;
        $service_masuk->id_pelanggan = $request->id_pelanggan;
        $service_masuk->id_teknisi = $request->id_teknisi;
        $service_masuk->tanggal_masuk = $request->tanggal_masuk;
        $service_masuk->jenis_layanan = $request->layanan;
        $service_masuk->status = '1';

        $detail = new DetailService;
        $detail->id_service = $request->id_service;
        $detail->nm_unit = $request->nama_unit;
        $detail->deskripsi_kerusakan = $request->deskripsi_kerusakan;
        $k = implode(",",$request->kelengkapan);
        $detail->kelengkapan_unit = $k;
        
        $pelanggan = Pelanggan::find($request->id_pelanggan);
       
        $pesan = [
            'id_service' => $request->id_service,
            'nama_pelanggan' => $pelanggan->nm_pelanggan,
            'telepon' => $pelanggan->telp,
            'email' => $pelanggan->user->email,
            'nama_unit' => $request->nama_unit,
            'tanggal_masuk' => $request->tanggal_masuk,
            'kelengkapan' => $k,
            'kerusakan' => $request->deskripsi_kerusakan,
            'jenis_layanan' => $request->layanan,
        ];
        
        Mail::to('inttecha@gmail.com')->send(new ServiceMasukPelanggan($pesan));
        $service_masuk->save();
        $detail->save();
        return view('dash.hal_pelanggan.pesanan_berhasil',['id_service' => $request->id_service]);
      
    }

    
    public function show($id)
    {
        //
        $service_masuk = ServiceMasuk::find($id);
        return view('dash.hal_pelanggan.detail_pesanan',['detail' => $service_masuk]);
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function pesan_jasa_selesai()
    {
        $pesan_jasa = ServiceMasuk::where([['id_pelanggan',Auth::user()->pelanggan->id_pelanggan],['status','=',8]])->orderBy('id_service', 'DESC')->get();
        return view('dash.hal_pelanggan.pesan_jasa_selesai',['transaksi'=>$pesan_jasa,'no'=>1]);
    }
    public function detail_pesanan_selesai($id)
    {
        $pesan_jasa = ServiceMasuk::find($id);
        $pembelian =  DB::table('transaksi')
        ->leftjoin('jasa','transaksi.id_pembelian','=','jasa.id_jasa')
        ->leftjoin('sparepart','transaksi.id_pembelian','=','sparepart.id_sparepart')
        ->select('transaksi.*','jasa.nm_jasa','sparepart.nm_sparepart')->where('id_service',$id)->get();
        return view('dash.hal_pelanggan.detail_pesanan_selesai',['detail' => $pesan_jasa, 'pembelian' => $pembelian]);
    }

}

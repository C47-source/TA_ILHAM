<?php

namespace App\Http\Controllers;

use App\Jasa;
use App\Spart;
use App\Pelanggan;
use App\Transaksi;
use App\ServiceMasuk;
use Illuminate\Http\Request;
use App\Mail\KirimEmailPelanggan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HalamanTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
            'id_pembelian' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required'
        ]);

        
        if ($request->jenis == 'jasa') {
            $id = $request->id_pembelian;
            $cek_jasa = Jasa::find($id);
            $harga = $cek_jasa->harga * $request->jumlah;
        }elseif($request->jenis == 'sparepart'){
            $id = $request->id_pembelian;
            $cek_jasa = Spart::find($id);
            $harga = $cek_jasa->harga * $request->jumlah;
        }
        
        
        $transaksi = new Transaksi;
        $transaksi->id_service = $request->id_service; 
        $transaksi->id_pembelian = $request->id_pembelian; 
        $transaksi->jenis_pembelian = $request->jenis; 
        $transaksi->jumlah = $request->jumlah; 
        $transaksi->harga = $harga; 

        $transaksi->save();

        return redirect()->back();  

       
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
        $request->validate([
            'catatan_teknisi' => ['required'],
        ]);
 
        $service_masuk = ServiceMasuk::find($id);

        $service_masuk->catatan_teknisi = $request->catatan_teknisi;

        $service_masuk->save();

        return redirect()->back()->with('success','Berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->delete();
        return redirect()->back()->with('success','Berhasil dihapus!');
    }

    public function service_masuk_teknisi()
    {
        $service_masuk = DB::table('service_masuk')->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')->join('users','service_masuk.id_pelanggan','=','users.id_user')->where([
            ['status','<',  5],
            ])->get();
    
        return view('dash.hal_teknisi.service_masuk_teknisi',['service_masuk' => $service_masuk,'no' => 1]);
    }
    public function klik_perbaiki($id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '5';
        $pelanggan = Pelanggan::findorfail($service_masuk->id_pelanggan);
        Mail::to($pelanggan->user->email)->send(new KirimEmailPelanggan($service_masuk));
        $service_masuk->save();
        return redirect('/proses-perbaikan')->with('success', 'unit sedang diperbaiki?');
    }

    public function proses_perbaikan()
    {
        $service_masuk = DB::table('service_masuk')->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')->join('users','service_masuk.id_pelanggan','=','users.id_user')->where([
            ['teknisi.id_teknisi', Auth::user()->teknisi->id_teknisi], 
            ['status','>=',  5],
            ['status','<=',  6]
            ])->get();;
        return view('dash.hal_teknisi.proses_perbaikan',['service_masuk' => $service_masuk,'no' => 1]);
    }
    public function selesai()
    {
        $service_masuk = DB::table('service_masuk')->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')->join('users','service_masuk.id_pelanggan','=','users.id_user')->where([
            ['teknisi.id_teknisi', Auth::user()->teknisi->id_teknisi], 
            ['service_masuk.status','>=',  7]
            
            ])->get();;
        return view('dash.hal_teknisi.service_selesai',['service_masuk' => $service_masuk,'no' => 1]);
    }
    public function catatan($id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $transaksi = DB::table('transaksi')
        ->leftjoin('jasa','transaksi.id_pembelian','=','jasa.id_jasa')
        ->leftjoin('sparepart','transaksi.id_pembelian','=','sparepart.id_sparepart')
        ->select('transaksi.*','jasa.nm_jasa','sparepart.nm_sparepart')->where('id_service',$id)->get();
        $jasa = Jasa::all();
        $spart = Spart::all();
        return view('dash.hal_teknisi.catatan_perbaikan',['service_masuk' => $service_masuk,'no' => 1, 'transaksi' => $transaksi,'jasa' => $jasa, 'spart' =>$spart]);
    }
    public function klik_tunda($id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '6';
        $service_masuk->save();
        return redirect()->back()->with('success', 'Perbaikan ditunda');
    }
    public function klik_lanjut($id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '5';
        $service_masuk->save();
        return redirect()->back()->with('success', 'Perbaikan dilanjutkan');
    }
    public function klik_selesai($id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '7';
        $service_masuk->save();
        return redirect()->back()->with('success', 'Perbaikan unit telah selesai');
    }


}

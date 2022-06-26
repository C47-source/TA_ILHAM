<?php

namespace App\Http\Controllers;

use App\Teknisi;
use App\Pelanggan;
use App\ServiceMasuk;
use App\DetailService;
use App\Mail\KirimTeknisi;
use Illuminate\Http\Request;
use App\Mail\KirimPesananSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ServiceMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = DB::table('service_masuk')->orderBy('id_service','DESC')->first();
        $pelanggan = Pelanggan::orderBy('id_pelanggan','DESC')->get();
        $service_masuk = DB::table('service_masuk')->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->leftjoin('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')->join('users','service_masuk.id_pelanggan','=','users.id_user')->where('status', '<',8)->get();
        $teknisi = Teknisi::all();
        return view('dash.service_masuk.data_service_masuk',['service_masuk' => $service_masuk,'id' => $id,'pelanggan' => $pelanggan,'no' => 1,'teknisi' => $teknisi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      
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
            'id_service' => 'required|unique:service_masuk',
            'id_pelanggan' => 'required',
            'id_teknisi' => 'required',
            'tanggal_masuk' => 'required',
            'jenis_layanan' => 'required'
        ]);

        $service_masuk = new ServiceMasuk;
        $service_masuk->id_service = $request->id_service;
        $service_masuk->id_pelanggan = $request->id_pelanggan;
        $service_masuk->id_teknisi = $request->id_teknisi;
        $service_masuk->tanggal_masuk = $request->tanggal_masuk;
        $service_masuk->jenis_layanan = $request->jenis_layanan;
        $service_masuk->status = '1';
        

        $service_masuk->save();

        return redirect()->back()->with('success','Berhasil menyimpan data service masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $service_masuk = ServiceMasuk::find($id);
        $detail= DetailService::where('id_service', $id)->get();
        return view('dash.service_masuk.detail_service_masuk',['service_masuk' => $service_masuk,'no' => 1,'detail' => $detail]);
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
            'id_teknisi' => 'required'
        ]);

        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->id_teknisi = $request->id_teknisi;
        $service_masuk->status = '3';
        $teknisi = Teknisi::find($request->id_teknisi);

        
        Mail::to($teknisi->user->email)->send(new KirimTeknisi($service_masuk));
        $service_masuk->save();

        return redirect()->back()->with('success', 'Berhasil mengirim ke Teknisi');
    }
    public function terima_admin(Request $request, $id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '2';
        $service_masuk->save();
        return redirect()->back()->with('success', 'Unit telah diterima admin?');
    }
    public function konfirmasi_admin(Request $request, $id)
    {
        $service_masuk = ServiceMasuk::find($id);
        $service_masuk->status = '8';

        $pelanggan = Pelanggan::find($service_masuk->id_pelanggan);
        Mail::to($pelanggan->user->email)->send(new KirimPesananSuccess($service_masuk));
        $service_masuk->save();
        return redirect()->back()->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_masuk = ServiceMasuk::find($id);

        $service_masuk->delete();

        $detail_service = DetailService::where('id_service',$id);
        if ($detail_service==true){
            $detail_service->delete();
        }else{

        }
        return redirect()->back()->with('success', ' Berhasil dihapus');
    }


}

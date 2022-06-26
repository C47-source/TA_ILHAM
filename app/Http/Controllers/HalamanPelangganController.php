<?php

namespace App\Http\Controllers;

use App\User;
use App\Pelanggan;
use App\ServiceMasuk;
use App\DetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HalamanPelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function jasa_handphone()
    {
        $ketegori = 'handphone';
        $id = DB::table('service_masuk')->orderBy('id_service','DESC')->first();
        return view('dash.hal_pelanggan.pesan_jasa',['ketegori' => $ketegori,'id' => $id]);
    }
    public function jasa_laptop()
    {
        $ketegori = 'laptop';
        $id = DB::table('service_masuk')->orderBy('id_service','DESC')->first();
        return view('dash.hal_pelanggan.pesan_jasa',['ketegori' => $ketegori,'id' => $id]);
    }
    public function jasa_komputer()
    {
        $ketegori = 'komputer';
        $id = DB::table('service_masuk')->orderBy('id_service','DESC')->first();
        return view('dash.hal_pelanggan.pesan_jasa',['ketegori' => $ketegori,'id' => $id]);
    }

    public function simpan_pesanan(Request $request)
    {
       
    }

    public function sedang_proses()
    {
        return view('dash.hal_pelanggan.data_pesanan_jasa');
    }

    public function profil_pelanggan($id)
    {
        $pelanggan = Pelanggan::findOrfail($id);
        return view('dash.hal_pelanggan.profil_pelanggan',['pelanggan' => $pelanggan]);
    }
    public function profil_update(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
          
            'alamat' => 'required'

        ]);
        $pelanggan = Pelanggan::find($request->id_pelanggan);
        $pelanggan->nm_pelanggan = $request->nama;
        $pelanggan->telp = $request->telepon;
        $pelanggan->alamat = $request->alamat;

        
      
        
        $pelanggan->save();
   
        return redirect()->back()->with('success', 'Berhasil di update');
    }
}

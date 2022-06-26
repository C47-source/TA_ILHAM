<?php

namespace App\Http\Controllers;

use App\Jasa;
use App\User;
use App\Spart;
use App\Teknisi;
use App\Pelanggan;
use App\ServiceMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'pelanggan'){

            $user = User::all();
            $pelanggan = Pelanggan::all();
            return view('dash.home',['user'=> $user,'pelanggan' => $pelanggan]);
        }elseif(Auth::user()->level == 'teknisi'){
             
       
        $service_masuk = DB::table('service_masuk')
                        ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')
                        ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
                        ->join('users','service_masuk.id_pelanggan','=','users.id_user')
                        ->where([['teknisi.id_teknisi', Auth::user()->teknisi->id_teknisi],['status','=',3]])->get();

        $proses = DB::table('service_masuk')
                        ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')
                        ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
                        ->join('users','service_masuk.id_pelanggan','=','users.id_user')
                        ->where([['teknisi.id_teknisi', Auth::user()->teknisi->id_teknisi],['status','>=',5],['status','<=',6]])
                        ->get();

        $selesai = DB::table('service_masuk')
                        ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')->join('teknisi','service_masuk.id_teknisi','=','teknisi.id_teknisi')
                        ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
                        ->join('users','service_masuk.id_pelanggan','=','users.id_user')
                        ->where([['teknisi.id_teknisi', Auth::user()->teknisi->id_teknisi],['status','>=',7]])->get();

        return view('dash.home',['service_masuk' => $service_masuk,'proses'=>$proses,'selesai' => $selesai]);
        }else if(Auth::user()->level == 'admin'){
            $pelanggan = DB::table('pelanggan')
                            ->join('users','pelanggan.id_pelanggan','=','users.id_user')->get();
            $teknisi =  DB::table('teknisi')
                            ->join('users','teknisi.id_teknisi','=','users.id_user')->get();
            $jasa = Jasa::all();
            $spart = Spart::all();
            $service_masuk = DB::table('service_masuk')
                        ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')
                        ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
                        ->join('users','service_masuk.id_pelanggan','=','users.id_user')
                        ->where('service_masuk.status','<', 8)->get();
            $transaksi = DB::table('service_masuk')
            ->join('pelanggan','service_masuk.id_pelanggan','=','pelanggan.id_pelanggan')
            ->join('detail_service_masuk','service_masuk.id_service','=','detail_service_masuk.id_service')
            ->join('users','service_masuk.id_pelanggan','=','users.id_user')
            ->where('service_masuk.status','=', 8)->get();
            return view('dash.home',[
                'pelanggan' => $pelanggan,
                'teknisi' => $teknisi,
                'service_masuk' => $service_masuk,
                'jasa' => $jasa,
                'spart' => $spart,
                'transaksi' => $transaksi,
            ]);
        }
        
    }
}

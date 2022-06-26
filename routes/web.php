<?php



use App\Spart;
use App\ServiceMasuk;
use App\Mail\TestMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterPelangganController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage_home');
});



Route::get('/produk', function () {
    $spart = Spart::all();
    return view('produk',['spart'=> $spart]);
})->name('produk');


Route::get('/login', function(){
    return view('auth.login')->name('login');
});

Route::resource('/data-transaksi', TransaksiController::class)->middleware('auth');
Route::resource('/data-pelanggan', PelangganController::class)->middleware('auth');
Route::resource('/data-teknisi', TeknisiController::class)->middleware('auth');
Route::resource('/data-jasa', JasaController::class)->middleware('auth');
Route::resource('/data-sparepart', SpartController::class)->middleware('auth');
Route::resource('/data-user', UserController::class)->middleware('auth');
// manajemen service masuk admin
Route::resource('/service-masuk', ServiceMasukController::class)->middleware('auth');
Route::resource('/detail-service', DetailServiceController::class)->middleware('auth');
Route::get('/terima-admin/{id}', 'ServiceMasukController@terima_admin');
Route::get('/konfirmasi-admin/{id}', 'ServiceMasukController@konfirmasi_admin');
// cetak
Route::get('/cetak/{id}', 'CetakController@cetak_struk')->middleware('auth');
Route::post('/cetak-laporan', 'CetakController@cetak_laporan')->middleware('auth');
// home 
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// auth 
Auth::routes();
// register 
Route::get('/daftar', 'RegisterPelangganController@daftar');
Route::post('/register-pelanggan','RegisterPelangganController@index')->name('register-pelanggan');


Route::group(['middleware' => 'auth'],function()
{
    // pelanggan
    Route::get('/pesan-jasa/handphone','HalamanPelangganController@jasa_handphone');
    Route::get('/pesan-jasa/laptop','HalamanPelangganController@jasa_laptop');
    Route::get('/pesan-jasa/komputer','HalamanPelangganController@jasa_komputer');
    Route::get('/pesan-jasa/komputer','HalamanPelangganController@jasa_komputer');
    Route::get('/profil-pelanggan/{id}','HalamanPelangganController@profil_pelanggan');
    Route::post('/profil-update','HalamanPelangganController@profil_update');
    Route::resource('/pesan-jasa', PesanJasaConroller::class);
    Route::get('/pesan-jasa-selesai', 'PesanJasaConroller@pesan_jasa_selesai');
    Route::get('/detail-pesanan-selesai/{id}', 'PesanJasaConroller@detail_pesanan_selesai');
    

    // teknisi

    Route::get('/service-masuk-teknisi','HalamanTeknisiController@service_masuk_teknisi');
    Route::get('/klik-perbaiki/{id}','HalamanTeknisiController@klik_perbaiki');
    Route::get('/klik-tunda/{id}','HalamanTeknisiController@klik_tunda');
    Route::get('/klik-lanjut/{id}','HalamanTeknisiController@klik_lanjut');
    Route::get('/klik-selesai/{id}','HalamanTeknisiController@klik_selesai');
    Route::get('/proses-perbaikan','HalamanTeknisiController@proses_perbaikan');
    Route::get('/service-selesai','HalamanTeknisiController@selesai');
    Route::get('/proses-perbaikan/catatan/{id}','HalamanTeknisiController@catatan');
    Route::resource('/catatan-perbaikan',HalamanTeknisiController::class);

    // setting password

    Route::resource('setting-password', SettingController::class);
});
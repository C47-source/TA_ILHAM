<?php

namespace App;


use Illuminate\Database\Eloquent\Model;




class ServiceMasuk extends Model
{
    protected $table='service_masuk';
    protected $primaryKey = 'id_service';
    protected $fillable = ['id_service','id_pelanggan','id_teknisi','tanggal_masuk','jenis_layanan','status','catatan_teknisi'];
    public $timestamps = false;

    

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function detail_service()
    {
        return $this->belongsTo(DetailService::class, 'id_service','id_service');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan','id_user');
    }
    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'id_teknisi');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_service','id_service');
    }

    // public function detail_service()
    // {
    //     return $this->belongsTo(DetailService::class, 'id_service');
    // }


}

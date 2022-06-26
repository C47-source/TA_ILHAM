<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_service','id_pembelian','jenis_pembelian','jumlah','harga'];
    public $timestamps = false;

    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'id_pembelian','id_jasa'); 
    }
    public function sparepart()
    {
        return $this->belongsTo(Spart::class, 'id_pembelian','id_sparepart'); 
    }
    
}

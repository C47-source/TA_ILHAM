<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table='pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['id_pelanggan','nm_pelanggan','telp','alamat'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan','id_user');
    }
}

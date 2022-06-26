<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    protected $table='teknisi';
    protected $primaryKey = 'id_teknisi';
    protected $fillable = ['id_teknisi','nm_teknisi','telp'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_teknisi','id_user');
    }
}

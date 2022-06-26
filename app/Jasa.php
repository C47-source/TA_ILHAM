<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table='jasa';
    protected $keyType ='string';
    protected $primaryKey = 'id_jasa';
    protected $fillable = ['id_jasa','nm_jasa','harga','ketegori'];
    public $timestamps = false;
}

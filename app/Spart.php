<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spart extends Model
{
    protected $table='sparepart';
    protected $keyType ='string';
    protected $primaryKey = 'id_sparepart';
    protected $fillable = ['id_sparepart','nm_sparepart','harga','ketegori'];
    public $timestamps = false;
}

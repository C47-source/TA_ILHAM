<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    protected $table='detail_service_masuk';
    protected $primaryKey = 'id_detail';
    protected $guarded = 'id_detail';
    public $timestamps = false;
}

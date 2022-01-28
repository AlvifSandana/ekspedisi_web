<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    //

    protected $table = 'pengiriman';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [

        'id_supir','nama_supir2','no_telp','status_muatan','tanggal_aktif'
        
    ];
}

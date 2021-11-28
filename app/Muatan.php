<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muatan extends Model
{
    // set attributes
    protected $table = 'muatan';
    public $timestamps = true;
    protected $primaryKey = 'idMuatan';
    protected $fillable = [
        'nama_muatan', 'pengirim_id', 'tanggal_muat', 'lokasi_kirim', 'catatan_muatan'
    ];
}

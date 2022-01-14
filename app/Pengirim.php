<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    // nama tabel
    protected $table = 'pengirim';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idPengirim';
    // mass-assignment
    protected $fillable = [
        'idPengirim', 'nama_pengirim', 'alamat_pengirim', 'nomor_telpon',
        'email', 'password', 'api_token'
    ];
}

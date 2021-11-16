<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    // nama tabel
    protected $table = 'supir';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idSupir';
    // mass-assignment
    protected $fillable = [
        'nama_supir', 'nama_supircadang', 'alamat_supir', 'nomor_telpon',
        'email', 'password', 'api_token', 'status'
    ];
}

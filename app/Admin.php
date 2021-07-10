<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // nama tabel
    protected $table = 'Admin';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idAdmin';
    // mass-assignment
    protected $fillable = [
        'nama_admin', 'alamat_admin', 'nomor_telpon',
        'email', 'password', 'api_token'
    ];
    // hidden kolom
    protected $hidden = [
        'password',
    ];
}

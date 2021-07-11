<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    // nama tabel
    protected $table = 'kendaraan';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idKendaraan';
    // mass-assignment
    protected $fillable = [
        'jenis_kendaraan', 'plat_kendaraan', 'tahun_kendaraan', 'Supir_idSupir'
    ];
}

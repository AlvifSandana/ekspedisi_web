<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // nama tabel
    protected $table = 'Barang';
    // otomatis mengisi tabel timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey ='idBarang';
    // mass-assignment
    protected $fillable = [
        'nama_barang', 'jenis_barang', 'berat_barang', 'Pengirim_idPengirim'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // nama tabel
    protected $table = 'transaksi';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'id_Transaksi';
    // mass-assignment
    protected $fillable = [
        'Admin_idAdmin', 'Barang_idBarang', 'Barang_Pengirim_idPengirim'
    ];
}

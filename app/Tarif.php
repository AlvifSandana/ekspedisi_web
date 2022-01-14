<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    // nama tabel
    protected $table = 'tarif';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idTarif';
    // mass-assignment
    protected $fillable = [
        'idTarif', 'titik_pengiriman', 'tujuan_pengiriman', 'tarif', 'status', 'keterangan'
    ];
}

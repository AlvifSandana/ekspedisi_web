<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // nama tabel
    protected $table = 'jadwal';
    // kolom primary key
    protected $primaryKey = 'idJadwal';
    // mass-assignment
    protected $fillable = [
        'Admin_idAdmin', 'Kendaraan_idKendaraan', 'Kendaraan_Supir_idSupir'
    ];
}

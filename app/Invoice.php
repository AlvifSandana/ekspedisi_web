<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    // nama tabel
    protected $table = 'invoice';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idInvoice';
    // mass-assignment
    protected $fillable = [
        'Transaksi_idTransaksi', 'Tansaksi_Admin_idAdmin', 'Transaksi_Barang_idBarang', 'Transaksi_Barang_Pengirim_idPengirim',
        'Jadwal_idJadwal', 'Jadwal_Admin_idAdmin', 'Jadwal_Kendaraan_idKendaraan', 'Jadwal_Kendaraan_Supir_idSupir'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    // nama tabel
    protected $table = 'transaksi';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idTransaksi';
    // mass-assignment
    protected $fillable = [
        'Admin_idAdmin', 'Barang_idBarang', 'Barang_Pengirim_idPengirim', 'status'
    ];

    public function byId(String $idTransaksi)
    {
        try {
            $result = 'Data tidak ditemukan!';
            // get data transaksi
            $data_transaksi = DB::table('transaksi')
                ->join('barang', 'Barang_idBarang', '=', 'barang.idBarang')
                ->join('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
                ->select('transaksi.*', 'barang.*', 'pengirim.*')
                ->where('idTransaksi', '=', $idTransaksi)
                ->get();
            if (sizeof($data_transaksi) > 0) {
                $result = $data_transaksi;
                return $result;
            }
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

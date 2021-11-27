<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        // get data transaksi
        $data_transaksi = DB::table('transaksi')
            ->join('barang', 'Barang_idBarang', '=', 'barang.idBarang')
            ->join('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
            ->select('transaksi.*', 'barang.*', 'pengirim.*')
            ->get();
        return view('admin.transaksi', compact('data_transaksi'));
    }
}

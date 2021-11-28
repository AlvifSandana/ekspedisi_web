<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(){
        // get invoice data
        $invoice = DB::table('invoice')
            ->join('transaksi', 'Transaksi_id_Transaksi', '=', 'transaksi.idTransaksi')
            ->join('barang', 'Transaksi_Barang_idBarang', '=', 'barang.idBarang')
            ->join('pengirim', 'Transaksi_Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
            ->join('jadwal', 'Jadwal_idJadwal', '=', 'jadwal.idJadwal')
            ->join('kendaraan', 'Jadwal_Kendaraan_idKendaraan', '=', 'kendaraan.idKendaraan')
            ->join('supir', 'Jadwal_Kendaraan_Supir_idSupir', '=', 'supir.idSupir')
            ->select('invoice.*', 'transaksi.*', 'barang.*', 'pengirim.nama_pengirim', 'jadwal.*', 'kendaraan.*', 'supir.nama_supir')
            ->get();
        // return view with data
        return view('admin.invoice', compact('invoice'));
    }

    public function show(){

    }

    public function createInvoice(){
        // TODO - method for create new invoice - 2021/11/28
    }

    public function updateInvoice($id){
        // TODO - method for update invoice by ID - 2021/11/28
    }

    public function deleteInvoice($id){
        // TODO - method for delete invoice by ID - 2021/11/28
    }
}

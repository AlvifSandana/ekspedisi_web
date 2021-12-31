<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Jadwal;
use App\Kendaraan;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        // get data supir
        $data_supir_kosong = DB::table('supir')
            ->join('jadwal', 'idSupir', '=', 'jadwal.Kendaraan_Supir_idSupir', 'left')
            ->where('jadwal.Kendaraan_Supir_idSupir', '=', NULL)
            ->get();
        return view('admin.transaksi', compact('data_transaksi', 'data_supir_kosong'));
    }

    /**
     * method untuk memproses transaksi
     */
    public function accTransaksi(Request $request)
    {
        try {
            // rules validasi
            $rules = [
                'idTransaksi'  => 'required',
                'Admin_idAdmin' => 'required',
                'Barang_idBarang' => 'required',
                'Barang_Pengirim_idPegirim' => 'required',
                'idSupir' => 'required',
                'status' => 'required'
            ];
            // kustom message validasi
            $message = [
                'required'  => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return redirect()->route('admin.transaksi.index')->withErrors($validator)->withInput();
            }
            // lolos validasi, update data dan create jadwal + invoice
            $transaksi = Transaksi::where('idTransaksi', $request->input('idTransaksi'))->update([
                'status' => 'diproses'
            ]);
            // get data kendaraan by idSupir
            $kendaraan = Kendaraan::where('Supir_idSupir', $request->input('idSupir'))->first();
            // model instance
            $jadwal = new Jadwal;
            $invoice = new Invoice;
            // create jadwal baru
            $jadwal->Admin_idAdmin = $request->input('Admin_idAdmin');
            $jadwal->Kendaraan_idKendaraan = $kendaraan->Kendaraan_idKendaraan;
            $jadwal->Kendaraan_Supir_id_supir = $kendaraan->Kendaraan_Supir_idSupir;
            $jadwal->tanggal_pemberangkatan = $request->input('tanggal_pemberangkatan');
            $jadwal->save();
            // create invoice baru
            $invoice->Transaksi_id_Transaksi = 0;
            $invoice->Transaksi_Admin_idAdmin = 0;
            $invoice->Transaksi_Barang_idBarang = 0;
            $invoice->Transaksi_Barang_Pengirim_idPengirim = 0;
            $invoice->Jadwal_idJadwal = 0;
            $invoice->Jadwal_Admin_idAdmin = 0;
            $invoice->Jadwal_Kendaraan_idKendaraan = 0;
            $invoice->Jadwal_Kendaraan_Supir_idSupir = 0;
            $invoice->save();
        } catch (\Throwable $th) {

        }
    }
}

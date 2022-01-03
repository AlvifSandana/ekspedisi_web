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
     * method untuk mengambil data transaksi
     * by id
     */
    public function getTransaksiById(Request $request)
    {
        try {
            // get id transaksi
            $id = $request->get('id');
            if ($id != '') {
                // get data transaksi
                $data_transaksi = DB::table('transaksi')
                    ->join('barang', 'Barang_idBarang', '=', 'barang.idBarang')
                    ->join('muatan', 'Barang_pengirim_idPengirim', '=', 'muatan.pengirim_id')
                    ->join('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
                    ->select('transaksi.*', 'barang.*', 'pengirim.idPengirim', 'pengirim.nama_pengirim', 'pengirim.alamat_pengirim', 'pengirim.nomor_telpon', 'muatan.*')
                    ->where('idTransaksi', '=', $id)
                    ->get();
                return json_encode($data_transaksi);
            } else {
                return json_encode('404 Not found');
            }
        } catch (\Throwable $th) {
            return json_encode($th->getMessage());
        }
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
                'Barang_Pengirim_idPengirim' => 'required',
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
            $jadwal->Kendaraan_idKendaraan = $kendaraan->idKendaraan;
            $jadwal->Kendaraan_Supir_idSupir = $kendaraan->Supir_idSupir;
            $jadwal->tanggal_pemberangkatan = $request->input('tanggal_pemberangkatan');
            $jadwal->save();
            // create invoice baru
            $invoice->Transaksi_id_Transaksi = $request->input('idTransaksi');
            $invoice->Transaksi_Admin_idAdmin = $request->input('Admin_idAdmin');
            $invoice->Transaksi_Barang_idBarang = $request->input('Barang_idBarang');
            $invoice->Transaksi_Barang_Pengirim_idPengirim = $request->input('Barang_Pengirim_idPengirim');
            $invoice->Jadwal_idJadwal = $jadwal->idJadwal;
            $invoice->Jadwal_Admin_idAdmin = $jadwal->Admin_idAdmin;
            $invoice->Jadwal_Kendaraan_idKendaraan = $kendaraan->idKendaraan;
            $invoice->Jadwal_Kendaraan_Supir_idSupir = $kendaraan->Supir_idSupir;
            $invoice->save();
            return redirect()->route('admin.transaksi.index')->with('success', 'Berhasil memproses transaksi!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.transaksi.index')->with('error', $th->getMessage());
        }
    }

    /**
     * method untuk meghapus transaksi by id
     */
    public function deleteTransaksi($id)
    {
        Transaksi::where('idTransaksi', $id)->delete();
        return back()->with('success', 'Data transaksi berhasil dihapus.');
    }
}

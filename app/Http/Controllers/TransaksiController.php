<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Jadwal;
use App\Kendaraan;
use App\Pengiriman;
use App\Transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    // public function index()
    // {
    //     // get data transaksi
    //     $data_transaksi = DB::table('transaksi')
    //         ->leftJoin('barang', 'Barang_idBarang', '=', 'barang.idBarang')
    //         ->leftJoin('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
    //         ->leftJoin('buah', 'jenis_barang', '=', 'buah.idBuah')
    //         ->select('transaksi.*', 'barang.*', 'pengirim.*','buah.*')
    //         ->get();
    //     // get data supir
    //     $data_supir_kosong = DB::table('supir')
    //         ->leftJoin('jadwal', 'idSupir', '=', 'jadwal.Kendaraan_Supir_idSupir', 'left')
    //         ->where('jadwal.Kendaraan_Supir_idSupir', '=', NULL)
    //         ->get();
    //     return view('admin.transaksi', compact('data_transaksi', 'data_supir_kosong'));
    //     // return $data_transaksi;
    // }

    public function index()
    {
        // get data transaksi
        $data_transaksi = DB::table('transaksi')
            ->leftJoin('muatan', 'transaksi.id_muatan', '=', 'muatan.idMuatan')
            ->leftJoin('buah', 'muatan.id_jenis', '=', 'buah.idBuah')
            ->leftJoin('pengirim', 'muatan.pengirim_id', '=', 'pengirim.idPengirim')
            ->leftJoin('tarif', 'muatan.lokasi_kirim', '=', 'tarif.idTarif')
            ->leftJoin('pengiriman', 'transaksi.id_supir', '=', 'pengiriman.id')
            ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')
            // ->leftJoin('pengirim', 'transaksi.id_pengirim', '=', 'pengirim.idPengirim')
            ->select('transaksi.*', 'muatan.*', 'pengirim.*','buah.*','tarif.*','pengiriman.*','supir.*')
            ->whereIn('status_transaksi',['tertunda','diproses'])
            ->get();

            $data_supir_kosong =  DB::table('pengiriman')
            ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')
            ->select('pengiriman.*','supir.*')
            
            ->get();
            
        // get data supir

        // return $data_transaksi;
       
        return view('admin.transaksi', compact('data_transaksi','data_supir_kosong'));
        // return $data_transaksi;
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
                ->leftJoin('muatan', 'transaksi.id_muatan', '=', 'muatan.idMuatan')
                ->leftJoin('buah', 'muatan.id_jenis', '=', 'buah.idBuah')
                ->leftJoin('pengirim', 'muatan.pengirim_id', '=', 'pengirim.idPengirim')
                ->leftJoin('tarif', 'muatan.lokasi_kirim', '=', 'tarif.idTarif')
                ->leftJoin('pengiriman', 'transaksi.id_supir', '=', 'pengiriman.id')
                ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')
                // ->leftJoin('pengirim', 'transaksi.id_pengirim', '=', 'pengirim.idPengirim')
                ->select('transaksi.*', 'muatan.*', 'pengirim.*','buah.*','tarif.*','pengiriman.*','supir.*')
                    // ->join('barang', 'Barang_idBarang', '=', 'barang.idBarang')
                    // ->join('muatan', 'Barang_pengirim_idPengirim', '=', 'muatan.pengirim_id')
                    // ->join('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
                    // ->select('transaksi.*', 'barang.*', 'pengirim.idPengirim', 'pengirim.nama_pengirim', 'pengirim.alamat_pengirim', 'pengirim.nomor_telpon', 'muatan.*')
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
                // 'idTransaksi'  => 'required',
                // 'Admin_idAdmin' => 'required',
                // 'Barang_idBarang' => 'required',
                // 'Barang_Pengirim_idPengirim' => 'required',
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
                'status_transaksi' => $request->input('status'),
                'id_supir' => $request->input('idSupir'),
            ]);
            // get data kendaraan by idSupir
            $kendaraan = Kendaraan::where('Supir_idSupir', $request->input('idSupir'))->first();
            // create new jadwal
            // $jadwal = Jadwal::create([
            //     'Admin_idAdmin' => $request->input('Admin_idAdmin'),
            //     'Kendaraan_idKendaraan' => $kendaraan->idKendaraan,
            //     'Kendaraan_Supir_idSupir' => $kendaraan->Supir_idSupir,
            //     'tanggal_pemberangkatan' => $request->input('tanggal_pemberangkatan'),
            // ]);
            if ($transaksi) {
                // create invoice baru
                // $invoice = Invoice::create([
                //     'Transaksi_id_Transaksi' => $request->input('idTransaksi'),
                //     'Transaksi_Admin_idAdmin' => 1,
                //     'Transaksi_Barang_idBarang' => $request->input('Barang_idBarang'),
                //     'Transaksi_Barang_Pengirim_idPengirim' => $request->input('Barang_Pengirim_idPengirim'),
                //     'Jadwal_idJadwal' => $jadwal->idJadwal,
                //     'Jadwal_Admin_idAdmin' => 1,
                //     'Jadwal_Kendaraan_idKendaraan' => $kendaraan->idKendaraan,
                //     'Jadwal_Kendaraan_Supir_idSupir' => $kendaraan->Supir_idSupir,
                // ]);
                // if ($invoice->save()) {
                //     return redirect()->route('admin.transaksi.index')->with('success', 'Berhasil memproses transaksi!');
                // }
                return redirect()->route('admin.transaksi.index')->with('success', 'Berhasil memproses transaksi!');
            }
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


    public function laporantransaksi(){
        $data_transaksi = DB::table('transaksi')
        ->leftJoin('muatan', 'transaksi.id_muatan', '=', 'muatan.idMuatan')
        ->leftJoin('buah', 'muatan.id_jenis', '=', 'buah.idBuah')
        ->leftJoin('pengirim', 'muatan.pengirim_id', '=', 'pengirim.idPengirim')
        ->leftJoin('tarif', 'muatan.lokasi_kirim', '=', 'tarif.idTarif')
        ->leftJoin('pengiriman', 'transaksi.id_supir', '=', 'pengiriman.id')
        ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')
        // ->leftJoin('pengirim', 'transaksi.id_pengirim', '=', 'pengirim.idPengirim')
        ->select('transaksi.*', 'muatan.*', 'pengirim.*','buah.*','tarif.*','pengiriman.*','supir.*')
        ->where('status_transaksi','selesai')
        ->get();

     

        return view('admin.laporan',compact('data_transaksi'));

    }
}

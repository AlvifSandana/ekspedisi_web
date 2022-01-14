<?php

namespace App\Http\Controllers\api;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Muatan;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create new transaksi
        try {
            // rules untuk validasi data
            $rules = [
                'idPengirim' => 'required',
                'jenis_muatan' => 'required',
                'tanggal_muat' => 'required',
                'lokasi_kirim' => 'required',
            ];
            // pesan kustom untuk validasi data
            $message = [
                'required' => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // validasi data
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => $validator->errors(),
                    'data' => []
                ], 200);
            }
            // lolos validasi, create barang
            $barang = Barang::create([
                'nama_barang' => $request->jenis_muatan,
                'jenis_barang' => $request->jenis_muatan,
                'berat_barang' => $request->berat_muatan,
                'Pengirim_idPengirim' => $request->idPengirim,
            ]);
            // create muatan
            $muatan = Muatan::create([
                'nama_muatan' => $request->jenis_muatan,
                'pengirim_id' => $request->idPengirim,
                'tanggal_muat' => $request->tanggal_muat,
                'lokasi_kirim' => $request->lokasi_kirim,
                'catatan_muatan' => $request->catatan,
            ]);
            // simpan data
            if ($barang->save() && $muatan->save()) {
                // create transaksi
                $transaksi = Transaksi::create([
                    'Admin_idAdmin' => 1,
                    'Barang_idBarang' => $muatan->idMuatan,
                    'Barang_Pengirim_idPengirim' => $request->idPengirim,
                    'status' => 'tertunda',
                ]);
                // simpan data transaksi
                if ($transaksi->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Berhasil memproses pengiriman!',
                        'data' => []
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Gagal memproses pengiriman!',
                        'data' => []
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Gagal memproses pengiriman!',
                    'data' => []
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $th->getTrace()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($idPengirim)
    {
        try {
            if ($idPengirim != '') {
                // get data transaksi
                $data_transaksi = DB::table('transaksi')
                    ->join('barang', 'Barang_idBarang', '=', 'barang.idBarang')
                    ->join('muatan', 'Barang_pengirim_idPengirim', '=', 'muatan.pengirim_id')
                    ->join('pengirim', 'Barang_Pengirim_idPengirim', '=', 'pengirim.idPengirim')
                    ->select('transaksi.*', 'barang.*', 'pengirim.idPengirim', 'pengirim.nama_pengirim', 'pengirim.alamat_pengirim', 'pengirim.nomor_telpon', 'muatan.*')
                    ->where('Barang_Pengirim_idPengirim', '=', $idPengirim)
                    ->get();

                if ($data_transaksi) {
                    return json_encode([
                        'status' => 'success',
                        'message' => 'Data tersedia',
                        'data' => $data_transaksi
                    ]);
                } else {
                    return json_encode([
                        'status' => 'failed',
                        'message' => 'Data tidak tersedia',
                        'data' => []
                    ]);
                }
            } else {
                return json_encode([
                    'status' => 'success',
                    'message' => 'Data tersedia',
                    'data' => []
                ]);
            }
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $th->getTraceAsString()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}

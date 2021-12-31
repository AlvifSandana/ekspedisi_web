<?php

namespace App\Http\Controllers\api;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
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
                'idpengirim' => 'required',
                'jenis_barang' => 'requierd',
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
            if ($validator->fails()){
                return response()->json([
                    'status' => 'failed',
                    'message' => $validator->errors(),
                    'data' => []
                ], 200);
            }
            // lolos validasi, create barang
            $barang = Barang::create([
                'nama_barang' => $request->jenis_barang,
                'jenis_barang' => $request->jenis_barang,
                'berat_barang' => $request->berat_barang,
                'Pengirim_idPengirim' => $request->idpengirim
            ]);
            // simpan data
            if ($barang->save()) {
                return response()->json([
                    'status' => 'success',
                    'message'=> 'Berhasil memproses pengiriman!',
                    'data' => []
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message'=> 'Gagal memproses pengiriman!',
                    'data' => []
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message'=> $th->getMessage(),
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
    public function show(Transaksi $transaksi)
    {
        //
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

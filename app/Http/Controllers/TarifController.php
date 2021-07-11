<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarifController extends Controller
{
    /**
     * show Tarif page
     */
    public function index(){
        // mendapatkan data tarif dari model
        $tarif = Tarif::all();
        // tampilkan view beserta data
        return view('admin.tarif', compact('tarif'));
    }

    /**
     * get tarif by ID
     * return JSON
     */
    public function show(Request $request){
        $id = $request->get('id');
        $tarif = Tarif::findOrFail($id);
        echo json_encode($tarif);
    }

    /**
     * add new Tarif
     */
    public function createTarif(Request $request){
        try {
            // rules validasi
            $rules = [
                'titik_pengiriman'  => 'required',
                'tujuan_pengiriman' => 'required',
                'tarif'             => 'required',
                'keterangan'        => 'required'
            ];
            // error message untuk validasi
            $message = [
                'required' => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            // lolos validasi, tambahkan data
            $tarif = Tarif::create([
                'titik_pengiriman'  => $request->input('titik_pengiriman'),
                'tujuan_pengiriman' => $request->input('tujuan_pengiriman'),
                'tarif'             => $request->input('tarif'),
                'status'            => $request->input('status'),
                'keterangan'        => $request->input('keterangan')
            ]);
            $tarif->save();
            // tampilkan pesan sukses, redirect ke halaman sebelumnya
            return redirect()->route('admin.tarif.index')->with('success', 'Data tarif berhasil disimpan.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.tarif.index')->withErrors($th->getMessage());
        }
    }

    /**
     * Update Tarif by ID
     */
    public function updateTarif(Request $request){
        try {
            // rules validasi
            $rules = [
                'update_titik_pengiriman'  => 'required',
                'update_tujuan_pengiriman' => 'required',
                'update_keterangan'        => 'required',
                'update_tarif'             => 'required',
                'update_status'            => 'required'
            ];
            // kustom message validasi
            $message = [
                'required'          => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return redirect()->route('admin.tarif.index')->withErrors($validator)->withInput();
            }
            // lolos validasi, update data tarif
            $tarif = Tarif::where('idTarif', $request->input('id'))->update([
                'titik_pengiriman'  => $request->input('update_titik_pengiriman'),
                'tujuan_pengiriman' => $request->input('update_tujuan_pengiriman'),
                'tarif'             => $request->input('update_tarif'),
                'status'            => $request->input('update_status'),
                'keterangan'        => $request->input('update_keterangan')
            ]);
            return redirect()->route('admin.tarif.index')->with('success', 'Data tarif berhasil diperbarui.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.tarif.index')->withErrors($th->getMessage());
        }
    }

    /**
     * Delete Tarif by ID
     */
    public function deleteTarif($id){
        Tarif::where('idTarif', $id)->delete();
        return back()->with('success', 'Data tarif berhasil dihapus.');
    }
}

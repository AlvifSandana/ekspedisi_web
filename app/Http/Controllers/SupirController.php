<?php

namespace App\Http\Controllers;

use App\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupirController extends Controller
{
    public function index()
    {
        $supir = Supir::all();
        return view('admin.supir', compact('supir'));
    }

    /**
     * get supir by ID
     * return JSON
     */
    public function show(Request $request){
        $id = $request->get('id');
        $supir = Supir::findOrFail($id);
        echo json_encode($supir);
    }

    public function updateSupir(Request $request)
    {
        try {
            // rules validasi
            $rules = [
                'nama_supir'  => 'required',
                'nama_supir_cadang' => 'required',
                'alamat_supir'        => 'required',
                'nomor_telpon'        => 'required',
                'status'            => 'required'
            ];
            // kustom message validasi
            $message = [
                'required'          => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return redirect()->route('admin.supir.index')->withErrors($validator)->withInput();
            }
            // lolos validasi, update data tarif
            $supir = Supir::where('idSupir', $request->input('idSupir'))->update([
                'nama_supir'  => $request->input('nama_supir'),
                'nama_supircadang' => $request->input('nama_supir_cadang'),
                'alamat_supir' => $request->input('alamat_supir'),
                'nomor_telpon'             => $request->input('nomor_telpon'),
                'status'            => $request->input('status'),
            ]);
            return redirect()->route('admin.supir.index')->with('success', 'Data supir berhasil diperbarui.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.supir.index')->withErrors($th->getMessage());
        }
    }

    /**
     * Delete Supir by ID
     */
    public function deleteSupir($id){
        Supir::where('idSupir', $id)->delete();
        return back()->with('success', 'Data supir berhasil dihapus.');
    }
}

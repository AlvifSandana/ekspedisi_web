<?php

namespace App\Http\Controllers;

use App\Buah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuahController extends Controller
{
    //
    public function index(){
        // mendapatkan data buah dari model
        $buah = Buah::all();
        // tampilkan view beserta data
        return view('admin.buah', compact('buah'));
    }

    /**
     * get tarif by ID
     * return JSON
     */
    public function show(Request $request){
        $id = $request->get('id');
        $buah = Buah::findOrFail($id);
        echo json_encode($buah);
    }

    /**
     * add new Tarif
     */
    public function createBuah(Request $request){
        try {
            // rules validasi
            $rules = [
                'buah'  => 'required',
      
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
            $tarif = Buah::create([
                'buah'  => $request->input('buah'),
              
            ]);
            $tarif->save();
            // tampilkan pesan sukses, redirect ke halaman sebelumnya
            return redirect()->route('admin.buah.index')->with('success', 'Data Buah berhasil disimpan.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.buah.index')->withErrors($th->getMessage());
        }
    }

    /**
     * Update Tarif by ID
     */
    public function updateBuah(Request $request){
        try {
            // rules validasi
            $rules = [
                'update_buah'  => 'required',
             
            ];
            // kustom message validasi
            $message = [
                'required'          => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return redirect()->route('admin.buah.index')->withErrors($validator)->withInput();
            }
            // lolos validasi, update data tarif
            Buah::where('idBuah', $request->input('id'))->update([
                'buah'  => $request->input('buah'),
      
            ]);
            return redirect()->route('admin.buah.index')->with('success', 'Data buah berhasil diperbarui.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.buah.index')->withErrors($th->getMessage());
        }
    }

    /**
     * Delete Tarif by ID
     */
    public function deleteBuah($id){
        Buah::where('idBuah', $id)->delete();
        return back()->with('success', 'Data Buah berhasil dihapus.');
    }
    
}

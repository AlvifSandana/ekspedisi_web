<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Kendaraan;
use App\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * show penjadwalan page
     */
    // public function index(){
    //     $data['jadwal'] = DB::table('jadwal')
    //                       ->join('kendaraan', 'jadwal.Kendaraan_idKendaraan', '=', 'kendaraan.idKendaraan')
    //                       ->join('supir', 'jadwal.Kendaraan_Supir_idSupir', '=', 'supir.idSupir')
    //                       ->select('jadwal.*', 'kendaraan.*', 'supir.*')
    //                       ->get();
    //     // create model object
    //     $m_kendaraan = new Kendaraan();
    //     $m_supir = new Supir();
    //     // get data kendaraan dan supir
    //     $data['kendaraan'] = $m_kendaraan->all();
    //     $data['supir'] = $m_supir->all();
    //     return view('admin.penjadwalan', compact('data'));
    // }
    public function index(){
        $data = DB::table('pengiriman')
                ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')
                ->select('pengiriman.*', 'supir.*')
                ->get();

                // return $data;
        
        return view('admin.penjadwalan', compact('data'));
    }

    /**
     * get jadwal by id
     * return JSON
     */
    public function show(Request $request){
        $id = $request->get('id');
        $jadwal = Jadwal::findOrFail($id);
        echo json_encode($jadwal);
    }

    public function createJadwal(){
        // TODO - method for create jadwal  - 2021/12/27
    }

    /**
     * update jadwal by id
     */
    public function updateJadwal(Request $request){
        try {
            // rules validasi
            $rules = [
                'tanggal_pemberangkatan' => 'required'
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
            $jadwal = Jadwal::where('idJadwal', $request->input('idJadwal'))->update([
                'tanggal_pemberangkatan' => $request->input('tanggal_pemberangkatan'),
            ]);
            return redirect()->route('admin..jadwal.index')->with('success', 'Data jadwal berhasil diperbarui.');
        } catch (\Throwable $th) {
            // catch error
            return redirect()->route('admin.jadwal.index')->withErrors($th->getMessage());
        }
    }

    /**
     * delete jadwal by id
     */
    public function deleteJadwal($id){
        Jadwal::where('idJadwal', $id)->delete();
        return back()->with('success', 'Data jadwal berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * show penjadwalan page
     */
    public function index(){
        $data_jadwal = DB::table('jadwal')
                          ->join('kendaraan', 'jadwal.Kendaraan_idKendaraan', '=', 'kendaraan.idKendaraan')
                          ->join('supir', 'jadwal.Kendaraan_Supir_idSupir', '=', 'supir.idSupir')
                          ->select('jadwal.*', 'kendaraan.*', 'supir.*')
                          ->get();
        // dd($data_jadwal);
        return view('admin.penjadwalan', compact('data_jadwal'));
    }

    public function show(){

    }

    public function createJadwal(){
        // TODO - method for create jadwal  - 2021/11/27
    }

    public function updateJadwal($id){
        // TODO - method update jadwal by id - 2021/11/27
    }

    public function deleteJadwal($id){
        // TODO - method for delete jadwal by id - 2021/11/27
    }
}

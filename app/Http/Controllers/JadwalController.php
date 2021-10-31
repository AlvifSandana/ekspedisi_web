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
                          ->select('jadwal.idJadwal', 'kendaraan.*', 'supir.*')
                          ->get();
        // return json_encode($data_jadwal);
        return view('admin.penjadwalan', compact('data_jadwal'));
    }

    public function show(){

    }

    public function createJadwal(){

    }

    public function updateJadwal($id){

    }

    public function deleteJadwal($id){

    }
}

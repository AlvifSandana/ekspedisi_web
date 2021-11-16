<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // get jadwal by query
            $data_jadwal = DB::table('jadwal')
                ->join('kendaraan', 'jadwal.Kendaraan_idKendaraan', '=', 'kendaraan.idKendaraan')
                ->join('supir', 'jadwal.Kendaraan_Supir_idSupir', '=', 'supir.idSupir')
                ->select('jadwal.idJadwal', 'kendaraan.*', 'supir.*')
                ->get();
            // jadwal available?
            if ($data_jadwal) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data tersedia.',
                    'data' => $data_jadwal
                ], 200);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Data tidak tersedia.',
                    'data' => []
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // get jadwal by query
            $data_jadwal = DB::table('jadwal')
                ->join('kendaraan', 'jadwal.Kendaraan_idKendaraan', '=', 'kendaraan.idKendaraan')
                ->join('supir', 'jadwal.Kendaraan_Supir_idSupir', '=', 'supir.idSupir')
                ->select('jadwal.idJadwal', 'kendaraan.*', 'supir.*')
                ->where('idJadwal', '=', $id)
                ->get();
            // jadwal available?
            if ($data_jadwal) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data tersedia.',
                    'data' => $data_jadwal
                ], 200);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Data tidak tersedia.',
                    'data' => []
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

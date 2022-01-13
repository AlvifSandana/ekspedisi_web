<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            // validation rules
            $rules = [
                'lat' => 'required',
                'long' => 'required',
                'idSupir' => 'required',
                'idMuatan' => 'required',
            ];
            // custom validation message
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
            // lolos validasi, insert data
            $insert_data = DB::table('tracking')
                ->insert([
                    'lat' => $request->input('lat'),
                    'long' => $request->input('long'),
                    'Supir_idSupir' => $request->input('idSupir'),
                    'muatan_idMuatan' => $request->input('idMuatan'),
                ]);
            // check
            if ($insert_data) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Lokasi terekam!',
                    'data' => []
                ], 200);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Gagal mengirim pembaruan lokasi!',
                    'data' => []
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $th->getTraceAsString()
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($idMuatan)
    {
        try {
            // get data tracking by idPengirim & idMuatan
            $data_tracking = DB::table('tracking')
                ->where('muatan_idMuatan', '=', $idMuatan)
                ->orderByDesc('idTracking')
                ->get();
            if ($data_tracking) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data tracking tersedia!',
                    'data' => $data_tracking
                ], 200);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Gagal mendapatkan pembaruan lokasi!',
                    'data' => []
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $th->getTraceAsString()
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

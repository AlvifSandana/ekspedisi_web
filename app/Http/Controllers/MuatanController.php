<?php

namespace App\Http\Controllers;

use App\Muatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MuatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.muatan');
    
    }

    public function indexs()
    {
       $muatan = DB::table('muatan')
        ->leftJoin('buah', 'muatan.buah_id', '=', 'buah.idBuah')
        ->leftJoin('tarif', 'muatan.lokasi_kirim', '=', 'tarif.idTarif')
        ->leftJoin('pengirim', 'muatan.pengirim_id', '=', 'pengirim.idPengirim')
        ->select('buah.*', 'tarif.*','pengirim.*','muatan.*')
        ->orderBy('muatan.idMuatan', 'DESC')->get();

        return $muatan;
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
     * @param  \App\Muatan  $muatan
     * @return \Illuminate\Http\Response
     */
    public function show(Muatan $muatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Muatan  $muatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Muatan $muatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Muatan  $muatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muatan $muatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Muatan  $muatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muatan $muatan)
    {
        //
    }
}

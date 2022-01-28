<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    //

    public function indexs()
    {
       $muatan = DB::table('pengiriman')
        ->leftJoin('supir', 'pengiriman.id_supir', '=', 'supir.idSupir')

        ->select('pengiriman.*', 'supir.*')
        ->orderBy('pengiriman.id', 'DESC')->get();

        return $muatan;
    }
}

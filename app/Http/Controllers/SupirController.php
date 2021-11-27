<?php

namespace App\Http\Controllers;

use App\Supir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    public function index()
    {
        $supir = Supir::all();
        return view('admin.supir', compact('supir'));
    }
}

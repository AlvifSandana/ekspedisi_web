<?php

namespace App\Http\Controllers\api;

use App\Pengirim;
use App\Supir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Transformers\PengirimTransformer;
use App\Http\Transformers\SupirTransformer;

class AuthController extends Controller
{
    /**
     * Register Pengirim
     */
    public function registerPengirim(Request $request)
    {
        try {
            // definisikan rules untuk vaidasi
            $rules = [
                'nama_pengirim'     => 'required',
                'alamat_pengirim'   => 'required',
                'nomor_telpon'      => 'required|max:12',
                'email'             => 'required|unique:pengirim',
                'password'          => 'required|min:8'
            ];
            // definisikan kustom message untuk validasi
            $message = [
                'required'          => ':attribute tidak boleh kosong!',
                'unique'            => ':attribute telah digunakan!',
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->errors(),
                    'data'      => []
                ], 200);
            }
            // lolos validasi, menambahkan data pengirim baru
            $pengirim = Pengirim::create([
                'nama_pengirim'     => $request->nama_pengirim,
                'alamat_pengirim'   => $request->alamat_pengirim,
                'nomor_telpon'      => $request->nomor_telpon,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'api_token'         => Hash::make($request->email)
            ]);
            $pengirim->save();
            // return success
            return response()->json([
                'status'    => 'success',
                'message'   => 'Berhasil register',
                'data'      => [(new PengirimTransformer)->transformWithEmail($pengirim)]
            ], 201);
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Login Pengirim
     */
    public function loginPengirim(Request $request)
    {
        try {
            // definisikan rules untuk validasi
            $rules = [
                'email'     => 'required',
                'password'  => 'required|min:8'
            ];
            // kustom error message untuk validasi
            $message = [
                'required'  => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->errors(),
                    'data'      => []
                ]);
            }
            // lolos validasi, cek email dan password
            $pengirim = Pengirim::where('email', $request->email)->first();
            if ($pengirim) {
                if (Hash::check($request->password, $pengirim->password)) {
                    // jika password benar
                    return response()->json([
                        'status'    => 'success',
                        'message'   => 'Berhasil login',
                        'data'      => [(new PengirimTransformer)->transformWithApiToken($pengirim)]
                    ], 200);
                } else {
                    // jika password salah
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'password salah!',
                        'data'      => []
                    ], 200);
                }
            } else {
                // jika data tidak ditemukan
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak ditemukan!',
                    'data'      => []
                ], 200);
            }
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Register Supir
     */
    public function registerSupir(Request $request)
    {
        try {
            // definisikan rules untuk vaidasi
            $rules = [
                'nama_supir'        => 'required',
                'nama_supircadang'  => 'required',
                'alamat_supir'      => 'required',
                'nomor_telpon'      => 'required|max:12',
                'email'             => 'required|unique:supir',
                'password'          => 'required|min:8'
            ];
            // definisikan kustom message untuk validasi
            $message = [
                'required'          => ':attribute tidak boleh kosong!',
                'unique'            => ':attribute telah digunakan!',
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->errors(),
                    'data'      => []
                ], 200);
            }
            // lolos validasi, menambahkan data supir baru
            $supir = Supir::create([
                'nama_supir'        => $request->nama_supir,
                'nama_supircadang'  => $request->nama_supircadang,
                'alamat_supir'      => $request->alamat_supir,
                'nomor_telpon'      => $request->nomor_telpon,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'api_token'         => Hash::make($request->email)
            ]);
            $supir->save();
            // return success
            return response()->json([
                'status'    => 'success',
                'message'   => 'Berhasil register',
                'data'      => [(new SupirTransformer)->transformWithEmail($supir)]
            ], 201);
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Login Supir
     */
    public function loginSupir(Request $request)
    {
        try {
            // definisikan rules untuk validasi
            $rules = [
                'email'     => 'required',
                'password'  => 'required|min:8'
            ];
            // kustom error message untuk validasi
            $message = [
                'required'  => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->errors(),
                    'data'      => []
                ]);
            }
            // lolos validasi, cek email dan password
            $supir = Supir::where('email', $request->email)->first();
            if ($supir) {
                if (Hash::check($request->password, $supir->password)) {
                    // jika password benar
                    return response()->json([
                        'status'    => 'success',
                        'message'   => 'Berhasil login',
                        'data'      => [(new SupirTransformer)->transformWithApiToken($supir)]
                    ], 200);
                } else {
                    // jika password salah
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'password salah!',
                        'data'      => []
                    ], 200);
                }
            } else {
                // jika data tidak ditemukan
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak ditemukan!',
                    'data'      => []
                ], 200);
            }
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Login (Pengirim dan Supir)
     */
    public function login(Request $request){
        try {
            // definisikan rules untuk validasi
            $rules = [
                'email'     => 'required',
                'password'  => 'required|min:8'
            ];
            // kustom error message untuk validasi
            $message = [
                'required'  => ':attribute tidak boleh kosong!'
            ];
            // instansiasi validator
            $validator = Validator::make($request->all(), $rules, $message);
            // proses validasi
            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => $validator->errors(),
                    'data'      => []
                ]);
            }
            // lolos validasi, cek apakah login sebagai
            // pengirim atau supir
            $pengirim = Pengirim::where('email', $request->email)->first();
            $supir = Supir::where('email', $request->email)->first();
            if ($pengirim) {
                if (Hash::check($request->password, $pengirim->password)) {
                    return response()->json([
                        'status'    => 'success',
                        'message'   => 'Berhasil login (pengirim)',
                        'data'      => [(new PengirimTransformer)->transformWithApiToken($pengirim)]
                    ], 200);
                } else {
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'email atau password salah!',
                        'data'      => []
                    ], 200);
                }
            } elseif ($supir) {
                if (Hash::check($request->password, $supir->password)) {
                    return response()->json([
                        'status'    => 'success',
                        'message'   => 'Berhasil login (supir)',
                        'data'      => [(new SupirTransformer)->transformWithApiToken($supir)]
                    ], 200);
                } else {
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'email atau password salah!',
                        'data'      => []
                    ], 200);
                }
            } else {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak ditemukan',
                    'data'      => []
                ], 200);
            }
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }
}

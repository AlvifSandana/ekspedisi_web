<?php

namespace App\Http\Middleware;

use App\Pengirim;
use App\Supir;
use Closure;

class CekToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            // get role from request header
            $role = $request->header('role');

            // get token from request header
            $token = $request->header('api-token');

            // check role and token
            if ($role == 'pengirim') {

                // get token with role 'pengirim'
                $pengirim = Pengirim::where('api_token', $token)->first();

                if ($pengirim) {
                    // if token match with database result,
                    // bypass the request to the next process
                    return $next($request);
                } else {
                    // if token mismatch,
                    // return the error message
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'token invalid, unauthorized!',
                        'data'      => []
                    ], 401);
                }

            } elseif ($role = 'supir') {
                // get token with role 'supir'
                $supir = Supir::where('api_token', $token)->first();

                if ($supir) {
                    // if token match with database result
                    // bypass the request to the next process
                    return $next($request);
                } else {
                    // if token mismatch,
                    // return the error message
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'token invalid, unauthorized!',
                        'data'      => []
                    ], 401);
                }
            }
        } catch (\Throwable $th) {
            // catch error, return the error message
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }
}

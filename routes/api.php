<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/reg/pengirim', 'api\AuthController@registerPengirim')->name('api.auth.reg.pengirim');
Route::post('auth/login/pengirim', 'api\AuthController@loginPengirim')->name('api.auth.login.pengirim');
Route::post('auth/reg/supir', 'api\AuthController@registerSupir')->name('api.auth.reg.supir');
Route::post('auth/login/supir', 'api\AuthController@loginSupir')->name('api.auth.login.supir');

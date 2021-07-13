<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth route
Route::get('/', 'AuthController@showLoginForm')->name('login.form');
Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

// dashboard route
Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard.index')->middleware('auth');

// tarif route
Route::get('admin/tarif', 'TarifController@index')->name('admin.tarif.index')->middleware('auth');
Route::get('admin/tarif/get', 'TarifController@show')->name('admin.tarif.show')->middleware('auth');
Route::post('admin/tarif/add', 'TarifController@createTarif')->name('admin.tarif.create')->middleware('auth');
Route::put('admin/tarif/update', 'TarifController@updateTarif')->name('admin.tarif.update')->middleware('auth');
Route::delete('admin/tarif/delete/{id}', 'TarifController@deleteTarif')->name('admin.tarif.delete')->middleware('auth');

// jadwal route

// invoice route

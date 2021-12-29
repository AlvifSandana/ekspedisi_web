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
Route::get('admin/jadwal', 'JadwalController@index')->name('admin.jadwal.index')->middleware('auth');
Route::get('admin/jadwal/get', 'JadwalController@show')->name('admin.jadwal.show')->middleware('auth');
Route::post('admin/jadwal/add', 'JadwalController@createJadwal')->name('admin.jadwal.create')->middleware('auth');
Route::put('admin/jadwal/update', 'JadwalController@updateJadwal')->name('admin.jadwal.update')->middleware('auth');
Route::delete('admin/jadwal/delete/{id}', 'JadwalController@deleteJadwal')->name('admin.jadwal.delete')->middleware('auth');

// invoice route
Route::get('admin/invoice', 'InvoiceController@index')->name('admin.invoice.index')->middleware('auth');
Route::get('admin/invoice/get', 'InvoiceController@show')->name('admin.invoice.show')->middleware('auth');
Route::post('admin/invoice/add', 'InvoiceController@createInvoice')->name('admin.invoice.create')->middleware('auth');
Route::put('admin/invoice/update', 'InvoiceController@updateInvoice')->name('admin.invoice.update')->middleware('auth');
Route::delete('admin/invoice/delete/{id}', 'InvoiceController@deleteInvoice')->name('admin.invoice.delete')->middleware('auth');

// transaksi route
Route::get('admin/transaksi', 'TransaksiController@index')->name('admin.transaksi.index')->middleware('auth');

// Supir route
Route::get('admin/supir', 'SupirController@index')->name('admin.supir.index')->middleware('auth');
Route::get('admin/supir/get', 'SupirController@show')->name('admin.supir.show')->middleware('auth');
Route::put('admin/supir/update', 'SupirController@updateSupir')->name('admin.supir.update')->middleware('auth');
Route::delete('admin/supir/delete/{id}', 'SupirController@deleteSupir')->name('admin.supir.delete')->middleware('auth');

// Muatan route
Route::get('admin/muatan', 'MuatanController@index')->name('admin.muatan.index')->middleware('auth');

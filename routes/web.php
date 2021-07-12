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

// dashboard route
Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

// tarif route
Route::get('admin/tarif', 'TarifController@index')->name('admin.tarif.index');
Route::get('admin/tarif/get', 'TarifController@show')->name('admin.tarif.show');
Route::post('admin/tarif/add', 'TarifController@createTarif')->name('admin.tarif.create');
Route::put('admin/tarif/update', 'TarifController@updateTarif')->name('admin.tarif.update');
Route::delete('admin/tarif/delete/{id}', 'TarifController@deleteTarif')->name('admin.tarif.delete');

// jadwal route

// invoice route

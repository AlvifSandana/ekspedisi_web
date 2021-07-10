<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->id('idTransaksi');
            $table->foreignId('Admin_idAdmin')->constrained('Admin', 'idAdmin')->onDelete('cascade');
            $table->foreignId('Barang_idBarang')->constrained('Barang', 'idBarang')->onDelete('cascade');
            $table->foreignId('Barang_Pengirim_idPengirim')->constrained('Pengirim', 'idPengirim')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transaksi');
    }
}
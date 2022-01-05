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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('idTransaksi');
            $table->foreignId('Admin_idAdmin')->constrained('admin', 'idAdmin')->onUpdate('cascade');
            $table->foreignId('Barang_idBarang')->constrained('barang', 'idBarang')->onUpdate('cascade');
            $table->foreignId('Barang_Pengirim_idPengirim')->constrained('pengirim', 'idPengirim')->onUpdate('cascade');
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
        Schema::dropIfExists('transaksi');
    }
}

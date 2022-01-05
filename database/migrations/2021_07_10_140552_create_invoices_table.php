<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('idInvoice');
            $table->foreignId('Transaksi_id_Transaksi')->constrained('transaksi', 'idTransaksi')->onUpdate('cascade');
            $table->foreignId('Transaksi_Admin_idAdmin')->constrained('transaksi', 'Admin_idAdmin')->onUpdate('cascade');
            $table->foreignId('Transaksi_Barang_idBarang')->constrained('transaksi', 'Barang_idBarang')->onUpdate('cascade');
            $table->foreignId('Transaksi_Barang_Pengirim_idPengirim')->constrained('transaksi', 'Barang_Pengirim_idPengirim')->onUpdate('cascade');
            $table->foreignId('Jadwal_idJadwal')->constrained('jadwal', 'idJadwal')->onUpdate('cascade');
            $table->foreignId('Jadwal_Admin_idAdmin')->constrained('jadwal', 'Admin_idAdmin')->onUpdate('cascade');
            $table->foreignId('Jadwal_Kendaraan_idKendaraan')->constrained('jadwal', 'Kendaraan_idKendaraan')->onUpdate('cascade');
            $table->foreignId('Jadwal_Kendaraan_Supir_idSupir')->constrained('jadwal', 'Kendaraan_Supir_idSupir')->onUpdate('cascade');
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
        Schema::dropIfExists('invoice');
    }
}

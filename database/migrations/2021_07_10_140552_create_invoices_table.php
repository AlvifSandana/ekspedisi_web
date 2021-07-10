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
        Schema::create('Invoice', function (Blueprint $table) {
            $table->id('idInvoice');
            $table->foreignId('Transaksi_id_Transaksi')->constrained('Transaksi', 'idTransaksi')->onDelete('cascade');
            $table->foreignId('Transaksi_Admin_idAdmin')->constrained('Transaksi', 'Admin_idAdmin')->onDelete('cascade');
            $table->foreignId('Transaksi_Barang_idBarang')->constrained('Transaksi', 'Barang_idBarang')->onDelete('cascade');
            $table->foreignId('Transaksi_Barang_Pengirim_idPengirim')->constrained('Transaksi', 'Barang_Pengirim_idPengirim')->onDelete('cascade');
            $table->foreignId('Jadwal_idJadwal')->constrained('Jadwal', 'idJadwal')->onDelete('cascade');
            $table->foreignId('Jadwal_Admin_idAdmin')->constrained('Jadwal', 'Admin_idAdmin')->onDelete('cascade');
            $table->foreignId('Jadwal_Kendaraan_idKendaraan')->constrained('Jadwal', 'Kendaraan_idKendaraan')->onDelete('cascade');
            $table->foreignId('Jadwal_Kendaraan_Supir_idSupir')->constrained('Jadwal', 'Kendaraan_Supir_idSupir')->onDelete('cascade');
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
        Schema::dropIfExists('Invoice');
    }
}

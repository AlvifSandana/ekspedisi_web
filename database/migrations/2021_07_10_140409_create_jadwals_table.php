<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jadwal', function (Blueprint $table) {
            $table->id('idJadwal');
            $table->foreignId('Admin_idAdmin')->constrained('Admin', 'idAdmin')->onDelete('cascade');
            $table->foreignId('Kendaraan_idKendaraan')->constrained('Kendaraan', 'idKendaraan')->onDelete('cascade');
            $table->foreignId('Kendaraan_Supir_idSupir')->constrained('Kendaraan', 'Supir_idSupir')->onDelete('cascade');
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
        Schema::dropIfExists('Jadwal');
    }
}

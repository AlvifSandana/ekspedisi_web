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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('idJadwal');
            $table->foreignId('Admin_idAdmin')->constrained('admin', 'idAdmin')->onUpdate('cascade');
            $table->foreignId('Kendaraan_idKendaraan')->constrained('kendaraan', 'idKendaraan')->onUpdate('cascade');
            $table->foreignId('Kendaraan_Supir_idSupir')->constrained('kendaraan', 'Supir_idSupir')->onUpdate('cascade');
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
        Schema::dropIfExists('jadwal');
    }
}
